<?php 
$drzave = ["Afghanistan"  , " Akrotiri"  , " Albania"  , " Algeria"  , " American Samoa"  , " Andorra"  , " Angola"  , " Anguilla"  , " Antarctica"  ,
" Antigua and Barbuda"  , " Argentina"  , " Armenia"  , " Aruba"  , " Ashmore and Cartier Islands"  , " Australia"  , " Austria"  , " Azerbaijan"  ,
 " Bahamas, The"  , " Bahrain"  , " Bangladesh"  , " Barbados"  , " Bassas da India"  , " Belarus"  , " Belgium"  , " Belize"  , " Benin"  , " Bermuda"  ,
  " Bhutan"  , " Bolivia"  , " Bosnia and Herzegovina"  , " Botswana"  , " Bouvet Island"  , " Brazil"  , " British Indian Ocean Territory"  ,
   " British Virgin Islands"  , " Brunei"  , " Bulgaria"  , " Burkina Faso"  , " Burma"  , " Burundi"  , " Cambodia"  , " Cameroon"  , " Canada"  ,
    " Cape Verde"  , " Cayman Islands"  , " Central African Republic"  , " Chad"  , " Chile"  , " China"  , " Christmas Island"  , " Clipperton Island"  ,
     " Cocos (Keeling) Islands"  , " Colombia"  , " Comoros"  , " Congo, Democratic Republic of the"  , " Congo, Republic of the"  , " Cook Islands"  ,
      " Coral Sea Islands"  , " Costa Rica"  , " Cote d'Ivoire"  , " Croatia"  , " Cuba"  , " Cyprus"  , " Czech Republic"  , " Denmark"  , " Dhekelia"  ,
       " Djibouti"  , " Dominica"  , " Dominican Republic"  , " Ecuador"  , " Egypt"  , " El Salvador"  , " Equatorial Guinea"  , " Eritrea"  , " Estonia"  ,
        " Ethiopia"  , " Europa Island"  , " Falkland Islands (Islas Malvinas)"  , " Faroe Islands"  , " Fiji"  , " Finland"  , " France"  ,
         " French Guiana"  , " French Polynesia"  , " French Southern and Antarctic Lands"  , " Gabon"  , " Gambia, The"  , " Gaza Strip"  , " Georgia"  ,
          " Germany"  , " Ghana"  , " Gibraltar"  , " Glorioso Islands"  , " Greece"  , " Greenland"  , " Grenada"  , " Guadeloupe"  , " Guam"  ,
           " Guatemala"  , " Guernsey"  , " Guinea"  , " Guinea-Bissau"  , " Guyana"  , " Haiti"  , " Heard Island and McDonald Islands"  , 
           " Holy See (Vatican City)"  , " Honduras"  , " Hong Kong"  , " Hungary"  , " Iceland"  , " India"  , " Indonesia"  , " Iran"  , " Iraq"  ,
            " Ireland"  , " Isle of Man"  , " Israel"  , " Italy"  , " Jamaica"  , " Jan Mayen"  , " Japan"  , " Jersey"  , " Jordan"  , 
            " Juan de Nova Island"  , " Kazakhstan"  , " Kenya"  , " Kiribati"  , " Korea, North"  , " Korea, South"  , " Kuwait"  , " Kyrgyzstan"  , 
            " Laos"  , " Latvia"  , " Lebanon"  , " Lesotho"  , " Liberia"  , " Libya"  , " Liechtenstein"  , " Lithuania"  , " Luxembourg"  , " Macau"  ,
             " Macedonia"  , " Madagascar"  , " Malawi"  , " Malaysia"  , " Maldives"  , " Mali"  , " Malta"  , " Marshall Islands"  , " Martinique"  ,
              " Mauritania"  , " Mauritius"  , " Mayotte"  , " Mexico"  , " Micronesia, Federated States of"  , " Moldova"  , " Monaco"  , " Mongolia"  , 
              " Montserrat"  , " Morocco"  , " Mozambique"  , " Namibia"  , " Nauru"  , " Navassa Island"  , " Nepal"  , " Netherlands"  , 
              " Netherlands Antilles"  , " New Caledonia"  , " New Zealand"  , " Nicaragua"  , " Niger"  , " Nigeria"  , " Niue"  , " Norfolk Island"  ,
               " Northern Mariana Islands"  , " Norway"  , " Oman"  , " Pakistan"  , " Palau"  , " Panama"  , " Papua New Guinea"  , " Paracel Islands"  ,
                " Paraguay"  , " Peru"  , " Philippines"  , " Pitcairn Islands"  , " Poland"  , " Portugal"  , " Puerto Rico"  , " Qatar"  , " Reunion"  ,
                 " Romania"  , " Russia"  , " Rwanda"  , " Saint Helena"  , " Saint Kitts and Nevis"  , " Saint Lucia"  , " Saint Pierre and Miquelon"  , 
                 " Saint Vincent and the Grenadines"  , " Samoa"  , " San Marino"  , " Sao Tome and Principe"  , " Saudi Arabia"  , " Senegal"  , " Serbia", 
                 "Montenegro"  , " Seychelles"  , " Sierra Leone"  , " Singapore"  , " Slovakia"  , " Slovenia"  , " Solomon Islands"  , " Somalia"  , 
                 " South Africa"  , " South Georgia and the South Sandwich Islands"  , " Spain"  , " Spratly Islands"  , " Sri Lanka"  , " Sudan"  ,
                  " Suriname"  , " Svalbard"  , " Swaziland"  , " Sweden"  , " Switzerland"  , " Syria"  , " Taiwan"  , " Tajikistan"  , " Tanzania"  ,
                   " Thailand"  , " Timor-Leste"  , " Togo"  , " Tokelau"  , " Tonga"  , " Trinidad and Tobago"  , " Tromelin Island"  , " Tunisia"  ,
                    " Turkey"  , " Turkmenistan"  , " Turks and Caicos Islands"  , " Tuvalu"  , " Uganda"  , " Ukraine"  , " United Arab Emirates"  , 
                    " United Kingdom"  , " United States"  , " Uruguay"  , " Uzbekistan"  , " Vanuatu"  , " Venezuela"  , " Vietnam"  , " Virgin Islands"  ,
                     " Wake Island"  , " Wallis and Futuna"  , " West Bank"  , " Western Sahara"  , " Yemen"  , " Zambia"  , " Zimbabwe"];


?>

<html>
    <main class="wrapper">
        <div class="middle">
            <form action="registerProcess" method="post" class="register-form">
                <label for="mail" class="form-label">Enter your e-mail:</label><br>
                <input type="email" name="mail" class="mail" placeholder="email@email.com" required><br>
                <label for="password" class="form-label">Enter your password:</label><br>
                <input type="password" name="password" class="password" placeholder="password" required><br>
                <label for="confirmPassword" class="form-label">Confirm your password:</label><br>
                <input type="password" name="confirmPassword" class="password" placeholder="confirm password" required><br>
                <label for="datumRodjenja" class="form-label">Choose your date of birth:</label><br>
                <?php
                    $godina=strval(intval(date('Y'))-18);
                    
                    $mesec=date('m');
                    
                    $dan=date('d');
                    
                    $birthday=$godina . "-" . $mesec . "-" . $dan;
                    echo "<input required type=\"date\" name=\"datumRodjenja\" id=\"birthday\" maxlength=\"4\" class=\"date\" placeholder=\"Year...\" max=\"$birthday\">";
                ?>
                <!-- <input type="date" name="datumRodjenja" class="date"><br> -->
                <label for="drzava" class="form-label">Choose your country:</label><br>
                <select name="country" class="country">
                    <?php 
                        foreach($drzave as $drzava){
                            echo "<option value='$drzava'>$drzava</option>";
                        }
                    ?>
                </select>
                <button type="submit" class="register-button">Send</button>
                <button type="reset" class="reset-button">Reset Fields</button>
            </form>
        </div>
    </main>    
</html>