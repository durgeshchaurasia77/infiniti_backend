<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\Comment;
class CommentController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.get_comment.';

    protected $type = 'Comments';
    protected $comments;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Comment           $comments
                        )
                        {
                            $this->comments = $comments;
                        }
        /**
      * get comments
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function index(Request $request) {

        # fetch comments list
        $query = $this->comments;

        $commentsData = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'commentsData'  => $commentsData ?? [],
                                                ]);
    }
}
