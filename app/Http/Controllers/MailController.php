<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    /**
     * Muestra el formulario de contacto.
     */
    public function mailform()
    {
        return view('mail');
    }

    /**
     * Procesa los datos del formulario y envía los correos.
     */
    public function maildata(Request $request)
    {
        // ✅ 1. Validar los datos del formulario
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'sub'   => 'required|string|max:255',
            'mess'  => 'required|string',
        ]);

        // ✅ 2. Extraer datos validados
        $name  = $validatedData['name'];
        $email = $validatedData['email'];
        $sub   = $validatedData['sub'];
        $mess  = $validatedData['mess'];

        // ✅ 3. Datos adicionales para la plantilla de correo
        $mailData = [
            'url' => 'https://sandroft.com/',
        ];

        try {
            // ✅ 4. Enviar correo al destinatario principal (Administrador)
            $adminEmail = "pruebasagicc23@gmail.com";
            Mail::to($adminEmail)->send(new SendMail($name, $email, $sub, $mess, $mailData));

            // ✅ 5. Enviar correo de confirmación al usuario
            $senderMessage = "Thanks for your message, we will reply to you later.";
            Mail::to($email)->send(new SendMessageToEndUser($name, $senderMessage, $mailData));

            // ✅ 6. Retornar vista con mensaje de éxito
            return back()->with('success', 'Correo enviado exitosamente.');
        } catch (\Exception $e) {
            // ✅ 7. Manejo de errores
            Log::error('Error sending email: ' . $e->getMessage());
            return back()->with('error', 'Hubo un problema al enviar el correo. Inténtalo nuevamente.');
        }
    }
}
