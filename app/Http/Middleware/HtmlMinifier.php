<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HtmlMinifier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($this->shouldMinify($response)) {
            $response->setContent($this->minify($response->getContent()));
        }

        return $response;
    }

    /**
     * Check if the response content should be minified.
     *
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @return bool
     */
    private function shouldMinify(Response $response): bool
    {
        $contentType = $response->headers->get('Content-Type');

        return str_starts_with($contentType, 'text/html') && !empty($response->getContent());
    }

    /**
     * Minifies the given HTML content.
     *
     * @param string $html The HTML content to be minified.
     * @return string The minified HTML content.
     */
    public function minify($html)
    {
        $cleanedHtml = preg_replace(
            [
                '/^\s+/m',           // Menghapus spasi di awal baris
                '/<!--.*?-->/s',     // Menghapus komentar HTML
            ],
            [
                '',                 // Kosongkan spasi di awal baris
                '',                 // Kosongkan komentar HTML
            ],
            $html
        );
        return $cleanedHtml;
    }

    // public function minify($html)
    // {
    //     return preg_replace(
    //         [
    //             '/\>\s+/s',      // Menghapus spasi di sekitar tag penutup
    //             '/\s+</s',       // Menghapus spasi di sekitar tag pembuka
    //             '/^\s+/m',
    //             '/<!--.*?-->/s', // Menghapus komentar HTML
    //         ],
    //         [
    //             '>',
    //             '<',
    //             '',
    //         ],
    //         $html
    //     );
    // }
}