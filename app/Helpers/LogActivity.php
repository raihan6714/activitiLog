<?php

use App\Models\LogActivity as LogActivityModel;
use Illuminate\Http\Request;
class LogActivity{

    public static function addToLog ($subject) {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::ip();
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        LogActivityModel::create($log);
    }

    public static function LogActivitsLists () {
        return LogActivityModel::latest()->get();
    }

}
