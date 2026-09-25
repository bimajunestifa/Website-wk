<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'image_url',
        'author',
        'published_at',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getFormattedContentAttribute()
    {
        $content = $this->content;
        if (empty($content)) {
            return '';
        }

        // If it already contains structured HTML paragraphs or lists
        if (preg_match('/<(?:p|ul|ol|li|h[1-6]|blockquote|div|table|strong|em|br)\b[^>]*>/i', $content)) {
            return $content;
        }

        return self::formatPlainText($content);
    }

    public static function formatPlainText($text)
    {
        $text = str_replace(["\r\n", "\r"], "\n", trim($text));
        $lines = explode("\n", $text);
        $cleanLines = [];
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed !== '') {
                $cleanLines[] = $trimmed;
            }
        }

        $html = '';
        $inList = false;
        $inCta = false;
        $count = count($cleanLines);

        for ($i = 0; $i < $count; $i++) {
            $line = $cleanLines[$i];

            // Contact / Hotline info items
            if (preg_match('/(?:📞|📍|📲|Hotline|Jl\.\s+Otto)/ui', $line)) {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                }
                if (!$inCta) {
                    $html .= "<div class=\"article-cta-box\">\n";
                    $inCta = true;
                }
                $html .= "<p style=\"margin: 0 0 6px 0;\">" . e($line) . "</p>\n";
                continue;
            }

            if ($inCta) {
                $html .= "</div>\n";
                $inCta = false;
            }

            // Bullet list item
            $isBullet = preg_match('/^(?:[-•*]|\d+\.)\s+(.+)$/u', $line, $bulletMatch);
            if ($isBullet) {
                if (!$inList) {
                    $html .= "<ul>\n";
                    $inList = true;
                }
                $html .= "<li>" . e($bulletMatch[1]) . "</li>\n";
                continue;
            }

            if ($inList) {
                $html .= "</ul>\n";
                $inList = false;
            }

            // Subheadings (short line without end punctuation, excluding intro phrases ending with colon)
            if (mb_strlen($line) <= 65 && !preg_match('/[.:,;?!—]$/u', $line) && !preg_match('/^(?:Garut|Jakarta|Bandung)/i', $line)) {
                $html .= "<h3>" . e($line) . "</h3>\n";
                continue;
            }

            // Blockquote
            if (preg_match('/^["“](.+)["”]$/u', $line, $qMatch)) {
                $html .= "<blockquote><p>" . e($qMatch[1]) . "</p></blockquote>\n";
                continue;
            }

            // Regular paragraph
            $html .= "<p>" . e($line) . "</p>\n";
        }

        if ($inList) {
            $html .= "</ul>\n";
        }
        if ($inCta) {
            $html .= "</div>\n";
        }

        return $html;
    }
}

