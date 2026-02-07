<?php

namespace App\Http\Controllers;

class DocumentsController extends Controller
{
    public function index()
    {
        $docs = [
            ['title' => 'Статут', 'file' => 'statut_mcp.pdf', 'type' => 'pdf'],
            ['title' => 'Неприбутковість', 'file' => 'nonprofitability.jpg', 'type' => 'image'],
            ['title' => 'Політика безпеки', 'file' => 'security_policy.pdf', 'type' => 'pdf'],
            ['title' => 'Політика захисту персональних даних', 'file' => 'protection_policy.pdf', 'type' => 'pdf'],
            ['title' => 'Політика захисту дітей', 'file' => 'child_protection_policy.pdf', 'type' => 'pdf'],
        ];

        return view('staticHeaderPages.documents', compact('docs'));
    }
}
