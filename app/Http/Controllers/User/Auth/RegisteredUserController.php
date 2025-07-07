<?php
namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationSuccessMail;
use App\Models\DictState;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{

    public function create()
    {
        $dictStates = DictState::all();
        return view('user.auth.register', ['dictStates' => $dictStates]);
    }

    public function store(Request $request): RedirectResponse
    {

        $data = $request->validate([
            'name'               => ['required', 'string', 'max:255'],
            'surname'            => ['required', 'string', 'max:255'],
            'email'              => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password'           => ['required', 'confirmed', Rules\Password::defaults()],
            'companyName'        => ['required', 'string', 'max:255'],
            'companyNIP'         => ['required', 'string', 'max:255'],
            'region'             => ['required', 'string', 'max:255'],
            'adress'             => ['required', 'string', 'max:255'],
            'postalCode'         => ['required', 'string', 'max:255'],
            'city'               => ['required', 'string', 'max:255'],
            'phone'              => ['required', 'string', 'max:255'],
            'deliveryName'       => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'deliveryRegion'     => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'deliveryAdress'     => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'deliveryPostalCode' => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'deliveryCity'       => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'deliveryPhone'      => ['required_if:repeatDetailsDelivery,false', 'string', 'max:255'],
            'agreeRegulation1'   => ['required', 'accepted'],
            'agreeRegulation2'   => ['required', 'accepted'],
            'agreeRegulation3'   => ['required', 'accepted'],
            'agreeRegulation4'   => ['required', 'accepted'],
        ]);

        if ($request->has('repeatDetailsDelivery')) {
            $data['deliveryName']       = $data['name'] . ' ' . $data['surname'];
            $data['deliveryRegion']     = $data['region'];
            $data['deliveryAdress']     = $data['adress'];
            $data['deliveryPostalCode'] = $data['postalCode'];
            $data['deliveryCity']       = $data['city'];
            $data['deliveryPhone']      = $data['phone'];
        }

        $user = User::create([
            'name'     => $data['name'],
            'surname'  => $data['surname'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'status'   => 0,
        ]);

        $userDetails = UserDetail::create([
            'user_id'              => $user->id,
            'name'                 => $data['name'],
            'surname'              => $data['surname'],
            'company_name'         => $data['companyName'],
            'nip'                  => $data['companyNIP'],
            'region'               => $data['region'],
            'address'              => $data['adress'],
            'postal_code'          => $data['postalCode'],
            'city'                 => $data['city'],
            'phone'                => $data['phone'],
            'delivery_name'        => $data['deliveryName'],
            'delivery_region'      => $data['deliveryRegion'],
            'delivery_address'     => $data['deliveryAdress'],
            'delivery_postal_code' => $data['deliveryPostalCode'],
            'delivery_city'        => $data['deliveryCity'],
            'delivery_phone'       => $data['deliveryPhone'],
            'agree_regulation1'    => $data['agreeRegulation1'] ? 1 : 0,
            'agree_regulation2'    => $data['agreeRegulation2'] ? 1 : 0,
            'agree_regulation3'    => $data['agreeRegulation3'] ? 1 : 0,
            'agree_regulation4'    => $data['agreeRegulation4'] ? 1 : 0,
        ]);

        event(new Registered($user));

        Mail::to($user->email)->send(new RegistrationSuccessMail($user));

        session()->flash('successRegister', __('Registration completed successfully!'));

        return redirect()->route('register');
    }
}
