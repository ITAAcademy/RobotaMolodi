<?php

namespace App\Http\Controllers;

class DocumentsController extends Controller
{
    public function index()
    {
        $docs = [
            ['title_key' => 'documents.statute', 'file' => 'statut_mcp.pdf', 'type' => 'pdf'],
            ['title_key' => 'documents.nonprofitability', 'file' => 'nonprofitability.jpg', 'type' => 'image'],
            ['title_key' => 'documents.security_policy', 'file' => 'security_policy.pdf', 'type' => 'pdf'],
            ['title_key' => 'documents.protection_policy', 'file' => 'protection_policy.pdf', 'type' => 'pdf'],
            ['title_key' => 'documents.child_protection_policy', 'file' => 'child_protection_policy.pdf', 'type' => 'pdf'],
        ];

        return view('staticHeaderPages.documents', compact('docs'));
    }
}
