<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Vinelab\NeoEloquent\Eloquent\Model;

class Person extends Model
{
    protected $label = 'Person';

    protected $fillable = ['name'];

    public function followers()
    {
        return $this->belongsToMany('App\Models\Person', 'FOLLOWS');
    }

    public function following()
    {
        return $this->hasMany('App\Models\Person','FOLLOWS');
    }

    public function findShortestPath($nodeAID,$nodeBID)
    {
        $nodeA= $this->find($nodeAID);
        $nodeB = $this->find($nodeBID);
        $cpher_query="
        MATCH p=shortestPath(
  (bacon:Person {uuid:$nodeAID})-[*]-(meg:Person {uuid:$nodeBID})
)
RETURN p
        ";
       dd(DB::select($cpher_query));

    }


    /**
     * Delete Follow Edge Between Two Nodes
     *
     * @param $nodeAID
     * @param $nodeBID
     * @return array
     */
    public function deleteFollowRelationship($nodeAID,$nodeBID)
    {
        $cypher="
        MATCH (:Person {uuid: $nodeAID})-[r:FOLLOWS]->(:Person {uuid: $nodeBID})
DELETE r;
        ";
        return DB::select($cypher);


    }


}
