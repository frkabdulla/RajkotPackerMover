<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //View For Admin Theme
        view()->share('adminTheme','adminTheme.default');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crudMessage($type, $module)
    {
        switch ($type) {
            case 'add':
                return $module . ' created successfully';
                break;
            case 'delete':
                return $module . ' deleted successfully';
                break;
            case 'update':
                return $module . ' updated successfully';
                break;
            
            default:
                # code...
                break;
        }
    }
}
