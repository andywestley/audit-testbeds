<?php
/**
 * Content Quality & Readability Heuristics Catalog Data
 * Defines metadata, rule triggers, standard citations, and text snippets for Content Testbed.
 */

$pillars = [
    'pillar-readability' => [
        'id' => 'pillar-readability',
        'name' => 'Reading Level & Complexity',
        'standard' => 'Flesch-Kincaid & Dale-Chall Heuristics',
        'icon' => 'bi-book',
        'color' => 'primary',
        'description' => 'Targeting grade level <= 9, avoiding complex multi-clause sentences, and preferring common vocabulary.'
    ],
    'pillar-clarity' => [
        'id' => 'pillar-clarity',
        'name' => 'Clarity, Voice & Style',
        'standard' => 'Plain English & Active Voice Guidelines',
        'icon' => 'bi-chat-left-text',
        'color' => 'info',
        'description' => 'Flagging passive voice, weasel words/intensifiers, overused idioms, and cliché expressions.'
    ],
    'pillar-inclusivity' => [
        'id' => 'pillar-inclusivity',
        'name' => 'Inclusivity, Tone & Safety',
        'standard' => 'W3C Diversity & Content Safety Heuristics',
        'icon' => 'bi-shield-check',
        'color' => 'danger',
        'description' => 'Prohibiting non-inclusive/gendered terms, ableist slurs, profanities, and mismatched language metadata.'
    ],
    'pillar-brand' => [
        'id' => 'pillar-brand',
        'name' => 'Brand Values & Resonance',
        'standard' => 'Thematic Brand Vocabulary & Lexicon',
        'icon' => 'bi-award',
        'color' => 'warning',
        'description' => 'Scoring keyword alignment, thesaurus synonym matching, and thematic vocabulary strength.'
    ]
];

$tests = [
    'reading-level' => [
        'slug' => 'reading-level',
        'file' => 'blog-bad-1.php',
        'compare_file' => 'blog-good-1.php',
        'rule' => 'content-reading-level-high',
        'name' => 'Reading Level & Complexity',
        'pillar' => 'pillar-readability',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'Flesch-Kincaid Grade Level Benchmark: "Web content should target lower secondary education (Grade 8-9) to ensure accessibility across reading proficiencies."',
        'trigger_summary' => 'Text blocks with Flesch-Kincaid Grade Level > 9.0, dense multi-syllable terminology, and sentence length exceeding 25 words per sentence.',
        'failing_snippet' => '<!-- FAILING: Grade 16+ reading level with dense Latinate vocabulary -->
<p>The obfuscation of the algorithmic methodology necessitates an exhaustive amalgamation of multidisciplinary paradigms to facilitate hyper-converged ledger reconciliations without synchronous telemetry intervention.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Grade 7 plain language with short active sentences -->
<p>We use different methods to solve this problem. Our tools work automatically in the background so you can focus on your work.</p>'
    ],

    'sentence-clarity' => [
        'slug' => 'sentence-clarity',
        'file' => 'blog-bad-2.php',
        'compare_file' => 'blog-good-2.php',
        'rule' => 'content-sentence-runon',
        'name' => 'Sentence Readability & Run-on Clauses',
        'pillar' => 'pillar-readability',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'Dale-Chall & Spache Readability Formula: "Excessive sentence length and nested clauses cause cognitive fatigue and drop-off."',
        'trigger_summary' => 'Sentences spanning more than 35 words with multiple nested relative clauses and parentheses.',
        'failing_snippet' => '<!-- FAILING: 45-word run-on sentence with nested subordinate clauses -->
<p>When our engineers first began developing the distributed query optimization subsystem, which was originally conceived during the initial architecture summit in Berlin, they realized that without caching, latency would degrade significantly under high concurrency.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Split into two clear, punchy sentences -->
<p>Our engineers began developing the distributed query optimizer in Berlin. They quickly added caching to keep response times fast under heavy load.</p>'
    ],

    'passive-voice' => [
        'slug' => 'passive-voice',
        'file' => 'news-bad-1.php',
        'compare_file' => 'news-good-1.php',
        'rule' => 'content-passive-voice',
        'name' => 'Passive Voice & Weasel Words',
        'pillar' => 'pillar-clarity',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'Plain English Campaign: "Active voice makes sentences direct, clear, and easy to attribute to actors."',
        'trigger_summary' => 'High frequency of passive constructions (was executed, were decided) and mitigating intensifiers (actually, basically, very).',
        'failing_snippet' => '<!-- FAILING: Passive constructions with weasel words -->
<p>The quarterly security audit was completed by our verification team, and basically it was felt that very significant improvements were made.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Direct active voice with strong verbs -->
<p>Our verification team completed the quarterly security audit and delivered significant system improvements.</p>'
    ],

    'inclusive-language' => [
        'slug' => 'inclusive-language',
        'file' => 'news-bad-2.php',
        'compare_file' => 'news-good-2.php',
        'rule' => 'content-noninclusive-terms',
        'name' => 'Inclusive & Respectful Language',
        'pillar' => 'pillar-inclusivity',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C Diversity & Inclusive Communication Standards: "Avoid gendered defaults and ableist idioms in public documentation."',
        'trigger_summary' => 'Use of gendered terms (man-hours, businessman) or ableist metaphors (crazy, insane, blind check).',
        'failing_snippet' => '<!-- FAILING: Gendered idioms and ableist metaphors -->
<p>It took over 500 man-hours to fix this crazy schedule so that any businessman could understand it.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Modern inclusive terminology -->
<p>It took over 500 work hours to simplify this schedule so that any business leader can understand it.</p>'
    ],

    'profanity-filter' => [
        'slug' => 'profanity-filter',
        'file' => 'product-bad-1.php',
        'compare_file' => 'product-good-1.php',
        'rule' => 'content-profanity-mild',
        'name' => 'Profanity & Sentiment Filtering',
        'pillar' => 'pillar-inclusivity',
        'severity' => 'Error',
        'severity_class' => 'danger',
        'citation' => 'Brand Safety & Content Moderation Standards: "Commercial and professional sites must maintain professional decorum."',
        'trigger_summary' => 'Inappropriate, aggressive, or profane vocabulary in public-facing product reviews or articles.',
        'failing_snippet' => '<!-- FAILING: Unmoderated profanity and aggressive sentiment -->
<p>This update is complete crap and total bullshit. The idiot who built this should be fired immediately.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Professional constructive criticism -->
<p>This update introduced several unexpected defects. We recommend reverting the deployment until issues are resolved.</p>'
    ],

    'brand-values' => [
        'slug' => 'brand-values',
        'file' => 'product-bad-2.php',
        'compare_file' => 'product-good-2.php',
        'rule' => 'content-brand-resonance',
        'name' => 'Brand Values & Lexicon Resonance',
        'pillar' => 'pillar-brand',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'Corporate Identity & Brand Resonance Heuristics: "Strategic copy should consistently reinforce core organizational brand themes."',
        'trigger_summary' => 'Copy that omits key brand terminology (Innovation, Reliability, Sustainability) in core corporate statements.',
        'failing_snippet' => '<!-- FAILING: Generic copy lacking brand keyword resonance -->
<p>We sell products to people and try to do a decent job every day.</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Aligned with core brand dictionary -->
<p>We deliver sustainable innovation and dependable reliability across every client partnership.</p>'
    ]
];

function getAdjacentContentTests($currentSlug, $tests) {
    $keys = array_keys($tests);
    $idx = array_search($currentSlug, $keys);
    
    $prev = null;
    $next = null;
    
    if ($idx !== false) {
        if ($idx > 0) {
            $prev = $tests[$keys[$idx - 1]];
        }
        if ($idx < count($keys) - 1) {
            $next = $tests[$keys[$idx + 1]];
        }
    }
    
    return [
        'index' => $idx + 1,
        'total' => count($keys),
        'prev' => $prev,
        'next' => $next
    ];
}