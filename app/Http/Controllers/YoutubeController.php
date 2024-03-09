<?php

namespace App\Http\Controllers;

use BenSampo\Embed\Services\YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google_Client;
use Google_Service_YouTube;

use Illuminate\Support\Facades\Storage;

class YoutubeController extends Controller
{
    public function displayVideo($videoId)
    {
        // Create a new instance of the Google API client
        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyCVyJtXSA772ShCgE-maKR0ZhgH4axk_mI'); // Replace with your API key

        // Create a new instance of the YouTube service
        $youtube = new YouTube($client);

        try {
            // Make an API request to retrieve video details by video ID
            $videoResponse = $youtube->videos->listVideos('snippet', ['id' => $videoId]);

            // Extract video details from the API response
            $video = $videoResponse->items[0];
            $videoTitle = $video->snippet->title;
            $videoDescription = $video->snippet->description;
            $videoThumbnail = $video->snippet->thumbnails->default->url;

            // Pass the extracted video details to the view
            return view('home', compact('videoId', 'videoTitle', 'videoDescription', 'videoThumbnail'));
        } catch (\Exception $e) {
            // Handle API request errors
            // Log the error or display an error message to the user
            return view('error', ['errorMessage' => 'Failed to retrieve video details']);
        }
    }
}
