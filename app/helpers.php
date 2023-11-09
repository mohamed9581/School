<?php

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;

if (!function_exists('afficher_image')) {
    function afficher_image($cheminFichier, $options = [],$nameDossier,$sexe)
    {

            $imageExiste = Storage::disk('upload_attachments')->exists('attachments/students/' . $nameDossier . '/profile/' . $cheminFichier);

        if ($imageExiste) {
           $url = asset('attachments/students/' . $nameDossier . '/profile/' . $cheminFichier);

            $optionsHtml = '';
            foreach ($options as $option => $valeur) {
                $optionsHtml .= $option . '="' . $valeur . '" ';
            }

            return new HtmlString('<img src="' . $url . '" ' . $optionsHtml . '>');
        }else{
            if($sexe=='Male'){
                $url = asset('assets/images/users/man.jpg');
            }else{
                $url = asset('assets/images/users/woman.jpg');
            }
             $optionsHtml = '';
            foreach ($options as $option => $valeur) {
                $optionsHtml .= $option . '="' . $valeur . '" ';
            }

            return new HtmlString('<img src="' . $url . '" ' . $optionsHtml . '>');

        }



    }
}
