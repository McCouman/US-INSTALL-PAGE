<?php

/**
 * Created by PhpStorm.
 * User: McCouman
 * Date: 08.04.17
 * Time: 20:50
 */
class install
{
    /**
     * INSTALL: lade download files als *.md herunter
     *
     */
    function install_md($version = "3.0.3")
    {
        // load german markdown-files
        $urlInstallDE = "https://raw.githubusercontent.com/Ultraschall/REAPER/" . $version . "/INSTALL-DE.md";
        $this->createMarkdownFile("DE", $urlInstallDE);
        #$urlChangelogDE = "https://raw.githubusercontent.com/Ultraschall/REAPER/3.0.3/CHANGELOG-DE.md";
        #$this->createMarkdownFile("de", $urlChangelogDE, "changelog");

        // load english markdown-files
        $urlInstallEN = "https://raw.githubusercontent.com/Ultraschall/REAPER/" . $version . "/INSTALL.md";
        $this->createMarkdownFile("EN", $urlInstallEN);
        #$urlChangelogEN = "https://raw.githubusercontent.com/Ultraschall/REAPER/3.0.3/CHANGELOG.md";
        #$this->createMarkdownFile("en", $urlChangelogEN, "changelog");

    }

    /**
     * SAVE:
     * Speichert install files als Markdown von Github und erstelle eine Kopie der Datei
     * unter: generator/md/ mit $language als Dateibezeichnung
     *
     * @param string $language
     * @param $url
     */
    function createMarkdownFile($language = "de", $url)
    {
        // Get cURL resource
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Ultraschall Install'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        unlink("../generator/md/INSTALL-" . $language . ".md");
        $file = fopen("../generator/md/INSTALL-" . $language . ".md", "w") or
        die("Kann Datei nicht schreiben");
        fwrite($file, $resp);
        fclose($file);
    }
}