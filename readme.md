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

### day-3

#### http methods

| http方法 | url | 动作 |
| ------ | ------ | ------ |
| GET | /tags | index |
| POST | /tags/{id} | store |
| PUT/PATCH | /tags/{id} | update |
| DELETE | /tags/{id} | destroy |
| GET | /tags/{id} | show |

#### softDelete
1. `$table->softDeletes()` 数据库添加deleted_at字段；
2. 模型使用softDeletes
```
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gather extends Model
{
    use SoftDeletes;

}
```
3. 控制器删除或者恢复 `Gather::withTrashed()->find($id)->restore();` `Gather::find($id)->destroy();`

#### paginate
`Tags::paginate($pageSize);` 页数->page /api/tags?page=1&pageSize=10

#### 文件上传

### day-4

#### Eloquent: 序列化
1. 模型添加 `$appends` 属性 `protected $appends = ['children']`
2. 模型添加属性对应方法
```
public function getChildrenAttribute(){
    return $this->where('pid', $this->id)->get()->count() ? $this->where('pid', $this->id)->get() : null;
}
```
