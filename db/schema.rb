# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `rails
# db:schema:load`. When creating a new database, `rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 2020_02_08_093814) do

  create_table "friendly_id_slugs", force: :cascade do |t|
    t.string "slug", null: false
    t.integer "sluggable_id", null: false
    t.string "sluggable_type", limit: 50
    t.string "scope"
    t.datetime "created_at"
    t.index ["slug", "sluggable_type", "scope"], name: "index_friendly_id_slugs_on_slug_and_sluggable_type_and_scope", unique: true
    t.index ["slug", "sluggable_type"], name: "index_friendly_id_slugs_on_slug_and_sluggable_type"
    t.index ["sluggable_type", "sluggable_id"], name: "index_friendly_id_slugs_on_sluggable_type_and_sluggable_id"
  end

  create_table "podcasts", force: :cascade do |t|
    t.string "url"
    t.string "title"
    t.text "description"
    t.string "created_by"
    t.string "rss"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.string "resourceable_type"
    t.integer "resourceable_id"
    t.index ["resourceable_type", "resourceable_id"], name: "index_podcasts_on_resourceable_type_and_resourceable_id"
  end

  create_table "resources", force: :cascade do |t|
    t.integer "vote_count", default: 0
    t.integer "created_by_id"
    t.integer "resourceable_id"
    t.string "resourceable_type"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.string "slug"
    t.index ["created_by_id"], name: "index_resources_on_created_by_id"
    t.index ["resourceable_id", "resourceable_type"], name: "index_resources_on_resourceable_id_and_resourceable_type"
    t.index ["slug"], name: "index_resources_on_slug", unique: true
  end

  create_table "users", force: :cascade do |t|
    t.string "email", default: ""
    t.string "encrypted_password", default: "", null: false
    t.string "reset_password_token"
    t.datetime "reset_password_sent_at"
    t.datetime "remember_created_at"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.string "provider"
    t.string "uid"
    t.string "image"
    t.string "description"
    t.string "name"
    t.string "username"
    t.index ["email"], name: "index_users_on_email", unique: true
    t.index ["reset_password_token"], name: "index_users_on_reset_password_token", unique: true
  end

  create_table "votes", force: :cascade do |t|
    t.integer "user_id", null: false
    t.integer "resource_id", null: false
    t.integer "count"
    t.string "payment_request"
    t.decimal "payment_amount"
    t.string "payment_id"
    t.boolean "settled"
    t.datetime "expires_at"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.index "\"user\", \"resource\", \"settled\"", name: "index_votes_on_user_and_resource_and_settled"
    t.index ["resource_id"], name: "index_votes_on_resource_id"
    t.index ["user_id"], name: "index_votes_on_user_id"
  end

  add_foreign_key "votes", "resources"
  add_foreign_key "votes", "users"
end
