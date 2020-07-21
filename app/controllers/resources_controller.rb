class ResourcesController < ApplicationController
  include Metataggable

  prepend_before_action :set_resource, only: [:show, :edit, :update, :destroy, :classify]
  before_action :load_resources, only: [:new, :create]
  before_action :authenticate_user!, except: [:index, :show]
  before_action :require_admin, only: [:classify]

  # GET /resources
  # GET /resources.json
  def index
    @resources = ResourceQuery.query(
      type: params[:type],
      time_scope: params[:time_scope] || 'month',
    ).paginate(page: params[:page], per_page: 15)

    if params[:type]
      @page_title = Resource::CATEGORIES[params[:type].to_sym].pluralize
    end
  end

  # GET /resources/1
  # GET /resources/1.json
  def show
    @display_back_button = back_link_available?
    @resource = @resource.decorate
  end

  # GET /resources/new
  def new
    @resource_categories = Resource::CATEGORIES

    if params[:type] != 'project'
      @resource_categories = @resource_categories.reject{|k| k == :project }
    end

    @resource_categories = @resource_categories.map{|c,d| [d,c]}
  end

  # POST /resources
  # POST /resources.json
  def create
    @resource = Resource.new(resource_params)
    @resource.created_by = current_user

    respond_to do |format|
      if @resource.save
        @resource_url = "/#{@resource.resourceable_type.underscore.pluralize}/#{@resource.slug}"
        format.html { redirect_to @resource_url, notice: 'Resource was successfully created.' }
        format.js { render :new }
      else
        format.html { render :new }
        format.js { render :new }
      end
    end
  end

  def classify
    if request.post?
      @resource.update(classify_resource_params)

      # Handling separately so approved triggers happen when the model has been properly updated
      @resource.update(approved: true) if params[:approved]
      redirect_to @resource.url
    end
  end

  private

  def classify_resource_params
    params.permit(
      :resourceable_type,
      resourceable_attributes: [:url, :title, :author_list]
    )
  end

  def load_resources
    @resources = Hash.new do |hash, key|
      hash[key] = key.to_s.classify.constantize.new.build_resource
    end
  end

    # Use callbacks to share common setup or constraints between actions.
    def set_resource
      @resource = Resource.friendly.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def resource_params
      params.require(:resource).permit(
        :resourceable_type,
        resourceable_attributes: [
          :url,
          :title,
          :description,
          :created_by,
          :image,
          :image_url,
          :rss,
          :author_list,
        ]
      )
    end
end
