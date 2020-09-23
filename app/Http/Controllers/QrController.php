<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use App\Http\Requests\QrCodeRequest;

class QrController extends Controller
{
    public function newCodes(QrCodeRequest $request)
    {
        $validatedData = $request->validated();

        $num = $validatedData['code_number'];

        $rowNumbers=3;
        //create new QR code entries
        $qrcodes = [];

        for ($i = 0; $i < $num; $i++) {
            $qrcode = QrCode::create([
                'prefix'  => $validatedData['prefix'],
                'code' => $validatedData['prefix'],
                ]);

            $qrcode->code = $validatedData['prefix'] . '_' . sprintf('%06d', $qrcode->id);
            $qrcode->save();

            $qrcodes[] = $qrcode;
        }

        return view('qr-print', ['qrcodes'=>$qrcodes, 'rowNumbers'=>$rowNumbers]);
    }

    public function printView()
    {
        if (session('qrcodes')) {
            $qrcodes = session()->get('qrcodes');
        } else {
            $qrcodes = QrCode::all();
        }

        return view('qr-print', compact('qrcodes'));
    }
}
