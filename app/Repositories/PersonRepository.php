<?php


namespace App\Repositories;


use App\Models\Person;

class PersonRepository implements RepositoryInterface
{
    /**
     * @var Person
     */
    private $model;

    /**
     * PersonRepository constructor.
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->model = $person;
    }

    /**
     * @return mixed
     */
    public function listAll()
    {
        return $this->model->paginate(4);
    }

    /**
     * Find Person Node By ID
     *
     * @param $id
     * @return Person
     */
    public function find($id)
    {
        return $this->model->with(['followers','following'])->find($id);
    }

    /**
     * Update Person Node
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        $person = $this->model->find($data['id']);
        $person->name = $data['name'];
        $person->save();
        return $person;
    }

    /**
     * Delete Person Node
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $person = $this->model->find($id);
        $person->delete();
        return true;
    }

    /**
     * Create Person Node
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $person = new $this->model;
        $person->name = $data['name'];
        $person->save();
        $person->uuid = $person->id;
        $person->save();
        return $person;
    }

    /**
     * Follow
     *
     * @param $data
     * @return mixed
     */
    public function follow($data)
    {
        $wants_to_follow = $this->model->find($data['wants_to_follow_id']);
        //Create Edge Only if there is no follow edge
        if(!$wants_to_follow->followers->find($data['person_id'])){
            $wants_to_follow->followers()->attach($data['person_id']);
            return $wants_to_follow;
        }
    }

    /**
     * UnFollow
     *
     * @param $data
     * @return mixed
     */
    public function unfollow($data)
    {
        return $this->model->deleteFollowRelationship($data['person_id'],$data['wants_to_follow_id']);
    }

    /**
     * Shortest Path
     *
     * @param $data
     */
    public function shortestPath($data)
    {
        return $this->model->findShortestPath($data['first_person_id'],$data['second_person_id']);
    }
}
