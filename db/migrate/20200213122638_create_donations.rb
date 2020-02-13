class CreateDonations < ActiveRecord::Migration[6.0]
  def change
    create_table :donations do |t|
      t.references :project, null: false, foreign_key: true
      t.decimal :amount_donated

      t.timestamps
    end
  end
end
