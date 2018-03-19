<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/19/2018
 * Time: 5:19 PM
 */

namespace App\Services;


use Tinify\AccountException;
use Tinify\ClientException;
use Tinify\ConnectionException;
use Tinify\Exception;
use Tinify\ServerException;
use Tinify\Tinify;

class ImageCompress
{
    /**
     * @param $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function tinifyImage($image)
    {
        try {
            // Register https://tinypng.com/developers and
            // Use the Tinify API client.
            Tinify::setKey(env('TINIFY_ID'));
            $source = \Tinify\fromFile($image);
            $source->toFile($image);
        } catch(AccountException $e) {
            // Verify your API key and account limit.
            return redirect()->back()->with('error', $e->getMessage());
        } catch(ClientException $e) {
            // Check your source image and request options.
            return redirect()->back()->with('error', $e->getMessage());
        } catch(ServerException $e) {
            // Temporary issue with the Tinify API.
            return redirect()->back()->with('error', $e->getMessage());
        } catch(ConnectionException $e) {
            // A network connection error occurred.
            return redirect()->back()->with('error', $e->getMessage());
        } catch(Exception $e) {
            // Something else went wrong, unrelated to the Tinify API.
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}