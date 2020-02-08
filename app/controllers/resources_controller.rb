class ResourcesController < ApplicationController
  before_action :set_resource, only: [:show, :edit, :update, :destroy]
  before_action :authenticate_user!, except: [:index, :show]

  # GET /resources
  # GET /resources.json
  def index
    if params[:type]
      @resources = Resource.where(resourceable_type: params[:type].to_s.classify)
    else
      @resources = Resource
    end

    @resources = @resources.order(vote_count: :desc).all
  end

  # GET /resources/1
  # GET /resources/1.json
  def show
  end

  # GET /resources/new
  def new
    @resources = {}

    Resource::CATEGORIES.each do |category, display|
      @resources[category] = Resource.new
      @resources[category].resourceable = (category.to_s.classify.constantize.new rescue nil)
    end
  end

  # POST /resources
  # POST /resources.json
  def create
    @resource = Resource.new(resource_params)
    @resource.created_by = User.first

    respond_to do |format|
      if @resource.save
        format.html { redirect_to "/#{@resource.resourceable_type.downcase.pluralize}/#{@resource.slug}", notice: 'Resource was successfully created.' }
        format.json { render :show, status: :created, location: @resource }
      else
        format.html { render :new }
        format.json { render json: @resource.errors, status: :unprocessable_entity }
      end
    end
  end

  private
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
          :rss
        ]
      )
    end
end
