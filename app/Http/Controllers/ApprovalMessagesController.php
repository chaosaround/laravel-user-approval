<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalMessagesController extends Controller
{
	/**
	 * Show approved message
	 */
    public function approved() {
		return view('approval.approved');
    }

	/**
	 * Show unapproved message
	 */
	public function unapproved() {
		return view('approval.unapproved');
	}
}
