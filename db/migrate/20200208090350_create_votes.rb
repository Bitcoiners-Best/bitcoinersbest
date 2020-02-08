class CreateVotes < ActiveRecord::Migration[6.0]
  def change
    create_table :votes do |t|
      t.references :user, null: false, foreign_key: true
      t.references :resource, null: false, foreign_key: true
      t.integer :count
      t.string :payment_request
      t.decimal :payment_amount
      t.string :payment_id
      t.boolean :settled
      t.datetime :expires_at

      t.timestamps
    end

    add_index :votes, [:user, :resource, :settled]
  end
end
