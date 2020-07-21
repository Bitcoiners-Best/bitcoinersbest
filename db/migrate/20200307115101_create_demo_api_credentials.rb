class CreateDemoApiCredentials < ActiveRecord::Migration[6.0]
  def change
    create_table :demo_api_credentials do |t|
      t.string :key
      t.string :secret
      t.boolean :used, default: false

      t.timestamps
    end
  end
end
