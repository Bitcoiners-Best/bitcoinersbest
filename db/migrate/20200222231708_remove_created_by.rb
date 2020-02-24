class RemoveCreatedBy < ActiveRecord::Migration[6.0]
  def up
    %i(Article Book Episode Podcast).each do |k|
      klass = eval(k.to_s)
      klass.where.not(created_by: nil).where.not(created_by: '').each do |r|
        puts "Adding author #{r.created_by} to #{r.title}"
        r.author_list.add(r.created_by)
        r.save!
      end
    end

    remove_column :articles, :created_by
    remove_column :books, :created_by
    remove_column :episodes, :created_by
    remove_column :podcasts, :created_by
  end
end
