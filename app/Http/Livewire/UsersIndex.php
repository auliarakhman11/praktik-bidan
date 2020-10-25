<?php

namespace App\Http\Livewire;

use App\Role;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;//nilai default pagitantion


    //search
    public $foo;
    public $search = '';
    public $page = 1;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    //variable form
    public $userId, $role, $name;

    public function render()
    {
        return view('livewire.users-index',[
            'users' => empty($this->search) ?
             User::join('model_has_roles','users.id','=','model_has_roles.model_id')->select('users.id','name','email','role_id','created_at')->orderBy('model_has_roles.role_id','asc')->paginate($this->paginate) :
             User::join('model_has_roles','users.id','=','model_has_roles.model_id')->select('users.id','name','email','role_id','created_at')->orderBy('model_has_roles.role_id','asc')->where('name','like', '%'.$this->search.'%')
             ->orWhere('email','like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function getUser($id){
        $user = User::find($id);
        $this->userId = $user['id'];
        $this->name = $user['name'];
    }

    public function getRoleUser($id){
        $user = User::find($id);
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->role = 2;
    }

    public function getRoleAdmin($id){
        $user = User::find($id);
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->role = 1;
    }

    public function resetInput(){// function agar mengkosongkan form input
        $this->userId = null;
        $this->name = null;
        $this->role = null;
    }

    public function deleteUser($userId){
        $data = User::find($userId);
        $data->delete();
        $this->resetInput();
        $this->emit('userDeleted');
    }

    public function updateRole($userId){
        Role::where('model_id', $userId)
        ->update(['role_id' => $this->role]);
        $this->resetInput();
        $this->emit('roleUpdated');
    }
}
