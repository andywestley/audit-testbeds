<?php
$pageTitle = 'The Corporate Salad';
$basePath = '../';
include '../includes/header.php';
?>

<h1>The Corporate Salad</h1>
    <p class="lead">Demonstrating unexpanded abbreviations (WCAG 3.1.4) and violations of COGA Clear Language best practices.</p>

    <div class="mt-4">
        <h2>Q3 EBITDA Alignment Strategy Memo</h2>
        <p>
            To all stakeholders: We must proactively facilitate a paradigm shift in our Q3 EBITDA projections prior to the upcoming EOD sync. It is imperative to ascertain that our cross-functional OKRs align seamlessly with the synergized CRM KPI dashboard. 
        </p>
        <p>
            Please ensure you utilize the updated ERP module to surface any discrepancies within the B2B pipeline. Failure to leverage the aforementioned CMS integration could adversely impact our holistic ROI and diminish our TAM capitalization efforts. We rely on your core competencies to drive this initiative forward, mitigating any potential bottlenecking in the UX/UI deployment phase.
        </p>
        <p>
            Furthermore, kindly endeavor to elucidate any ambiguity surrounding the RFP submission process by referencing the SOP document housed on the internal intranet portal. As we pivot towards a more agile methodology, maintaining robust synergies across all departmental silos will be paramount to our sustained overarching success in the competitive APAC region.
        </p>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            This page demonstrates a failure of <strong>WCAG 2.2 Success Criterion 3.1.4 (Abbreviations)</strong> and <strong>COGA Best Practices for Clear Language</strong>.
            The text is overloaded with obscure and industry-specific acronyms (EBITDA, EOD, OKR, CRM, KPI, ERP, B2B, CMS, ROI, TAM, UX, UI, RFP, SOP, APAC) that are never expanded upon their first use, nor do they use the <code>&lt;abbr&gt;</code> tag.
            Additionally, the passage uses needlessly complex and long business jargon ("facilitate" instead of "help", "utilize" instead of "use", "ascertain" instead of "find out") which creates unnecessary cognitive load for the reader.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
