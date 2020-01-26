# Laravel Repository [TheRepository]
This laravel package provides various feature -
- `Repository` - This is used abstracts the data layer.
- `Request Mapper` - This is used to maps the request data with model.



## Requirements:
- Laravel 5.6+
- PHP 7+

## Installation
To get started, install TheRepository via composer:
```bash
composer require thenandan/therepository
```

## Creating a Repository
To create a repository run -
```bash
php artisan make:repository UserRepository
```
This command will create UserRepository class inside `app\Repositories` directory.
Class structure will be as below -
```php
<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use TheNandan\TheRepository\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
    * UserRepository constructor.
    *
    * @param Model $model
    */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}
```

Now replace `Model` with `User` model in constructor, class will look like -
```php
<?php

namespace App\Repositories;

use App\User;
use TheNandan\TheRepository\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
    * UserRepository constructor.
    *
    * @param User $user
    */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
```

## Helper Methods
##### To apply condition -
- condition($column, $operator = null, $value = null)
- orCondition($column, $operator = null, $value = null)
- conditionIn($column, array $values)
- orConditionIn($column, array $values)
- conditionNotIn($column, array $values)
- orConditionNotIn($column, array $values)
- conditionBetween($column, array $values)
- conditionNotBetween($column, array $values)
- orConditionBetween($column, array $values)
- orConditionNotBetween($column, array $values)
- hasRelation($relation, Closure $callback = null)
- orHasRelation($relation, Closure $callback = null)
- hasNoRelation($relation, Closure $callback = null)
- orHasNoRelation($relation, Closure $callback = null)
- callback(Closure $closure)
- orderBy($column, $order = Order::ASC)

##### To Create/Update/Delete -
- create(array $columns)
- createMultiple(array $columns)
- update(array $conditions, array $columns)
- updateOrCreate(array $conditions, array $columns)
- delete()

##### To fetch the data -
- ``fetchOne(array $columns = ['*'])`` - Works as `first` method in Laravel
- ``fetch(array $columns = ['*'])``  - Works as `get` method in Laravel
- ``fetchById($id, array $columns = ['*'])``  Works as `find` method in Laravel
- ``fetchByKey(string $key, string $value, array $columns = ['*'])`` - Returns collection
- ``latest($column = null)`` - Works as `latest` method in Laravel
- ``oldest($column = null)`` - Works as `oldest` method in Laravel

## Request Mapper
This feature removes the hassle of manually checking and mapping the each filed while creating/updating.
 To use this our model must implement the `HasRequestMapping` interface.
 Now user model will look like -
 ```php
<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TheNandan\TheRepository\Utilities\Contracts\HasRequestMapping;

class User extends Authenticatable implements HasRequestMapping
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @inheritDoc
     */
    public function mapRequest(): array
    {
        return [
            'first_name' => 'firstName',
            'last_name' => 'lastName',
            'email' => 'emailAddress',
            'password' => 'userPassword'
        ];
    }
}
```
Here you can see, we need to define `mapRequest` method in our model,
this method returns an array
where -
- array key -> represent the column name
- array value -> represent the key name in the request

Now, lets create and update the user table and see how we can use this awesome feature.

Our controller will will have `update` & `store` method as below -
```php
<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * This method update the user data into the database
     *
     * @param int $id
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function update($id, Request $request)
    {
        return $this->userRepository->updateUser($id, $request);
    }

    /**
     * This method stores the new user data into the database
     *
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->userRepository->createUser($request);
    }
}
```
We will update out repository as below -
```php
<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use TheNandan\TheRepository\Repository\BaseRepository;
use TheNandan\TheRepository\Utilities\RequestMapper;

class UserRepository extends BaseRepository
{
    /**
    * UserRepository constructor.
    *
    * @param User $user
    */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * Create the new user
     *
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function createUser(Request $request)
    {
        return $this->create(RequestMapper::mapIntoArray($request->toArray(), $this->getModel()));
    }

    /**
     * Update the user data
     *
     * @param $userId
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function updateUser($userId, Request $request)
    {
        $user = $this-$this->fetchById($userId);
        return $this->create(RequestMapper::mapIntoArray($request->toArray(), $user));
    }
}
```
- Here in `create` method we need to provide the model object/class.
- Here in `update` method we need to provide the old model, this method will ignore the keys where value is same in request and in database.
##### Note:
Any key which in not present in the request or not defined in the `mapRequest` method will be ignored.
