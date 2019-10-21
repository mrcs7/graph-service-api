<?php
namespace App\Repositories;

interface RepositoryInterface{
    public function listAll();
    public function create($data);
    public function delete($id);
    public function update($data);
    public function shortestPath($data);
    public function follow($data);
    public function unfollow($data);
}
