<?php

session_start();

        /*********** Taille de l'image ************/
        $x=250;
        $y=75;
        $image = imagecreatetruecolor($x, $y); 

        /*********** Forme et Couleur du fond ************/
        $bg = imagecolorallocate($image, 255, 255, 255);  
        imagefilledrectangle($image,0,0,250,75,$bg);
        
        /*********** Lignes horizontales aléatoires ************/
        // Lignes jaunes
        $line_color_yellow = imagecolorallocate($image, 250, 205, 25);
        for($i=0;$i<3;$i++) {    
            imageline($image, 0, rand(0, 74), 250, rand(0, 74), $line_color_yellow);
        }
        // Lignes bleue-noire
        $line_color_dark = imagecolorallocate($image, 92, 12, 3);
        for($i=0;$i<3;$i++) {    
            imageline($image, 0, rand(0, 74), 250, rand(0, 74), $line_color_dark);
        }
        
        /*********** 800 points bleus placés aléatoirement ************/
        $pixel_color = imagecolorallocate($image, 25, 80, 250);
        for($i=0;$i<800;$i++) {
            imagesetpixel($image, rand(0, 249), rand(0, 74), $pixel_color);
        }  
        
        /*********** Couleurs des lettres ************/
        $noir = imagecolorallocate($image,0,0,0);
        $gris = imagecolorallocate($image,65,70,75);
        $orange = imagecolorallocate($image,220,100,0);
        $bleu = imagecolorallocate($image,10,10,100);
        $rouge = imagecolorallocate($image,120,0,0);
        $vert = imagecolorallocate($image,7,135,0);
        $violet = imagecolorallocate($image,86,0,135);
        $vertBleu = imagecolorallocate($image,0,95,112);

        $couleurs=[$noir, $gris, $orange, $bleu, $rouge, $vert, $violet, $vertBleu];

        $offsets=[-12,0,12];                        // variation (en points) autour de l'axe x
        $angles=[-22,0,22];                         //variation (en points) autour de l'axe y
        $tailles=[18,22,26];                        // tailles des fonts
        $lettres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';    //lettres possibles

        /*********** Fonts possibles ************/
        $ttfpath = [];
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/alpha_echo.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/ANUDRG.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/belligerent.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/BOYCOTT_.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/carbontype.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/DOWNCOME.TTF';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/edo.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/EraserRegular.ttf';
        $ttfpath[] = '/var/www/vhosts/fgainza.fr/captcha.fgainza.fr/fonts/Moms_typewriter-webfont.ttf';

        $ttf=[];
        for($i=0;$i<count($ttfpath);$i++){
            $ttf[]=mb_convert_encoding($ttfpath[$i], 'big5', 'utf-8');
        }

        /*********** Nb d'éléments ************/
        $lenLettres = strlen($lettres);
        $lenTailles = count($tailles);
        $lenAngles = count($angles);
        $lenOffsets = count($offsets);
        $lenCouleurs = count($couleurs);
        $lenTtfpath = count($ttfpath);

        /*********** Détermination aléatoire du pass Captcha et de sa disposition ************/
        $nbr=6;         // Nb de caractères du Captcha
        $lettre='';
        $pass = '';
        for ($i = 0; $i < $nbr; $i++) {
            $lettre = $lettres[rand(0, $lenLettres-1)];
            $taille = $tailles[rand(0, $lenTailles-1)];
            $angle = $angles[rand(0, $lenAngles-1)];
            $offset = $offsets[rand(0, $lenOffsets-1)];
            $couleur = $couleurs[rand(0, $lenCouleurs-1)];
            $police = $ttf[rand(0, $lenTtfpath-1)];
            imagefttext($image, $taille, $angle, $i*($x/$nbr)+10, $y-25+$offset, $couleur, $ttf[5], $lettre); 
            $pass.=$lettre;
        }

        /*********** On passe le code en session  ************/
        $_SESSION['captcha_string'] = $pass;

        header('Content-type: image/png');  // On indique que le fichier PHP est une image
        imagepng($image);                   // On l'affiche
        imagedestroy($image);               // Puis on la supprime