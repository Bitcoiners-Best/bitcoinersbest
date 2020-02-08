class AcceptNullEmail < ActiveRecord::Migration[6.0]
  def change
    change_column :users, :email, :string, :null => true
  end
end
