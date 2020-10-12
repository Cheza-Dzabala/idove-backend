<?php

namespace App\Http\Resources;

use App\ConnectionRequests;
use App\Connections;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $connected = $this->checkConnection();
        // dd(json_decode(json_encode($connected)));

        return [
            'user_id' => $this->user_id,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'date_joined' => $this->date_joined,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'country_of_residence' => $this->country_of_residence,
            'city_of_residence' => $this->city_of_residence,
            'nationality' => $this->nationality,
            'pve_work' => $this->pve_work,
            'phone_number' => $this->phone_number,
            'area_of_expertise' => $this->area_of_expertise,
            'physical_address' => $this->physical_address,
            'marital_status' => $this->marital_status,
            'other_explained' => $this->other_explained,
            'religion' => $this->religion,
            'hobbies' => $this->hobbies,
            'favourite_tv_shows' => $this->favourite_tv_shows,
            'favourite_movies' => $this->favourite_movies,
            'favourite_music_bands' => $this->favourite_music_bands,
            'favourite_books' => $this->favourite_books,
            'favourite_writers' => $this->favourite_writers,
            'favourite_games' => $this->favourite_games,
            'other_interests' => $this->other_interests,
            'avatar' => $this->avatar,
            'cover_image' => $this->cover_image,
            'linked_in' => $this->linked_in,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'website' => $this->website,
            'country_name' => $this->country_name,
            'user' => $this->user,
            'work_and_education' => $this->work_and_education,
            'connection' => $connected
        ];
    }

    private function checkConnection() {
        $sent_connection = ConnectionRequests::whereRequestor(Auth::user()->id)
            ->whereRequested($this->user_id)->where('status', '=', 'pending')->first();

        $requested =  ConnectionRequests::whereRequestor($this->user_id)
        ->whereRequested(Auth::user()->id)->where('status', '=', 'pending')->first();

        $connected = Connections::where('user_1', '=', Auth::user()->id)->where('user_2', '=', $this->user_id)
        ->orWhere('user_1', '=',  $this->user_id)->where('user_2', '=', Auth::user()->id)->first();

        if($sent_connection) {
            return [
                'status' => true,
                'transacting' => true,
                'message' => 'You sent this user a connection request'
            ];
        }else if($requested){
            return [
                'status' => true,
                'transacting' => true,
                'message' => 'This user sent you a connection request'
            ];
        }else if($connected) {
            return [
                'status' => true,
                'transacting' => true,
                'message' => 'You are already connected to this user'
            ];
        }else {
            return [
                'status' => false,
                'transacting' => false,
                'message' => 'You are not connected to this user'
            ];
        }
    }
}
