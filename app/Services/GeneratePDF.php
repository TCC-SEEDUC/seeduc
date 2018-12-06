<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Activity;
use PDF;

/**
 * 
 */
class GeneratePDF 
{

	public function generateCertificate($event_id, $user_id)
	{
		$user_subscriptions = Subscription::join('events', 'subscriptions.event_id', '=', 'events.id')
		->join('users', 'subscriptions.user_id', '=', 'users.id')
		->where('events.id', $event_id)
		->where('users.id', $user_id)
		->get();
		print($user_subscriptions);
		$pdf = PDF::loadView('certificates.certificate',['subscription' => $user_subscriptions]);
		return $pdf->download("certificado.pdf");
	}

	public function generateSubscriptionsList($id)
	{
		print_r('eu');
		$subscribers = Activity::with('users', 'subscriptions')->where('id', 1)->get();
		$pdf = PDF::loadView('list.index', ['subscribers' => $subscribers]);
		return $pdf->download("list.pdf");
	}

}