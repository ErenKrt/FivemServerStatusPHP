<?php
namespace EpEren\FivemServerStatus;

class FivemServerStatus
{
    private $baseUrl = "https://servers-frontend.fivem.net/api/servers/single";
    private $httpContext;

    public function __construct()
    {
        $this->httpContext = stream_context_create([
            'http' => [
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 OPR/101.0.0.0\r\n" .
                            "Referer: https://servers.fivem.net/\r\n" .
                            "Origin: https://servers.fivem.net\r\n"
            ]
        ]);
    }

    public function Get($Code)
    {
        $url = $this->baseUrl . "/" . $Code;
        $content = file_get_contents($url, false, $this->httpContext);

        if ($content === false) {
            throw new \Exception("Can't fetch fivem API.");
        }

        $result = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("JSON decoding error: " . json_last_error_msg());
        }

        return $result['Data'];
    }

    public function IsOnline($Code)
    {
        $server = $this->Get($Code);
        $endpoint = $server['connectEndPoints'][0] ?? null;

        if ($endpoint === null) {
            return false;
        }

        $url = "http://" . $endpoint . "/info.json";
        $content = file_get_contents($url, false, $this->httpContext);

        if ($content === false) {
            return false;
        }

        return true;
    }
}