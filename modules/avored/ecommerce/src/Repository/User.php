<?php
namespace AvoRed\Ecommerce\Repository;

use AvoRed\Ecommerce\Models\Database\Address;
use AvoRed\Ecommerce\Models\Database\AdminUser;
use AvoRed\Ecommerce\Models\Database\Country;
use AvoRed\Ecommerce\Models\Database\Role;
use AvoRed\Ecommerce\Models\Database\Wishlist;
use AvoRed\Framework\Repository\AbstractRepository;
use AvoRed\Ecommerce\Models\Database\User as UserModel;

class User extends AbstractRepository {


    public function model() {
        return new UserModel;
    }

    public function adminUserModel() {
        return new AdminUser;
    }

    public function roleModel() {
        return new Role;
    }

    public function countryModel()
    {
        return new Country;
    }

    public function addressModel(){
        return new Address;
    }

    public function wishlistModel() {
        return new Wishlist();
    }

    /**
     * Create User
     *
     * @param array $data
     * @return \AvoRed\Ecommerce\Models\Database\User $address
     */
    public function createUser($data):UserModel {
        return $this->model()->create($data);
    }

    /**
     * Destroy User
     *
     * @param integer $id
     * @return bool
     */
    public function destroyUserById($id) {
        return $this->model()->destroy($id);
    }

    /**
     * Find User by Id
     *
     * @param integer $id
     * @return \AvoRed\Ecommerce\Models\Database\User $address
     */
    public function findUserById($id):UserModel {
        return $this->model()->find($id);
    }

    /**
     * Get User by Email Address
     *
     * @param string $email
     * @return null|\Illuminate\Database\Eloquent\Collection $addressCollection
     */
    public function findUserByEmail($email) {
        return $this->model()->whereEmail($email)->get();
    }

    /**
     * Get All Addresses of a given User
     *
     * @param integer $userId
     * @return null|\Illuminate\Database\Eloquent\Collection $addressCollection
     */
    public function allUserAddresses($userId) {
        return $this->addressModel()->whereUserId($userId)->get();
    }

    /**
     * Find Address By Address ID
     *
     * @param integer $addressId
     * @return \AvoRed\Ecommerce\Models\Database\Address $address
     */
    public function findAddress($addressId):Address {
        return $this->addressModel()->find($addressId);
    }

    /**
     * Create User Address
     *
     * @param array $data
     * @return \AvoRed\Ecommerce\Models\Database\Address $address
     */
    public function createUserAddress($data):Address {
        return $this->addressModel()->create($data);
    }



    /**
     * Destroy the  Address by Given Id
     *
     * @param integer $id
     * @return boolean
     */
    public function destroyUserAddress($id):bool {
        return $this->addressModel()->destroy($id);
    }




    /**
     * Get Country Options for drop down
     *
     * @return \Illuminate\Support\Collection $countryOptions
     */
    public function countryOptions() {
        $countryOptions = $this->countryModel()->all()->pluck('name','id');
        $countryOptions->prepend('Please Select', null);

        return $countryOptions;
    }

    /**
     * Get Role Options for drop down
     *
     * @return \Illuminate\Support\Collection $countryOptions
     */
    public function roleOptions() {
        $options = $this->roleModel()->all()->pluck('name','id');
        $options->prepend('Please Select', null);

        return $options;
    }

}


