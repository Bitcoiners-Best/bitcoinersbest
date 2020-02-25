class AddPeriodToDonations < ActiveRecord::Migration[6.0]
  def change
    add_column :donations, :period, :string
  end
end
