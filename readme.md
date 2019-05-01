### day-1
1. php artisan make:migration create-tags-table
2. php artisan make:model Models/Tag
3. php artisan make:controller TagController
4. /routes/api.php test

#### $hidden
$hidden in model to hide arrt. See api `/api/tags`.

### day-2

1. 创建模型与数据库迁移 `php artisan make：model Models/Article -m` -m(migration)
2. 修改table column
`php artisan make:migration add_tag_ids_to_articles --table=articles`
`$table->dropColumn('tag_id');`
`$table->char('tag_ids', 100)->nullable()->comment('文章标签')；`
`php artisan migrate`
