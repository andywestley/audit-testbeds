<?php
$pageTitle = 'Survey Step 2 (User Journey)';
$basePath = '../';
include '../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Detailed Survey - Step 2</h1>
        
        <!-- Issue: Progress bar relies on visual appearance, missing aria attributes -->
        <div style="width: 100%; background-color: #e0e0e0; height: 20px; margin-bottom: 20px;">
            <div style="width: 50%; background-color: #76c7c0; height: 100%;"></div>
        </div>
        <p>Step 2 of 3</p>

        <form action="survey_complete.php" method="POST">
            
            <!-- Issue: Checkbox without associated label (label wraps text but not input, or separated) -->
            <div class="mb-3">
                Subscribe to newsletter: <input type="checkbox" name="newsletter">
            </div>

            <!-- Issue: Radio buttons not grouped in fieldset/legend -->
            <div class="mb-3">
                <p>Preferred Format:</p>
                <div>
                    <input type="radio" name="format" value="html"> HTML
                </div>
                <div>
                    <input type="radio" name="format" value="text"> Plain Text
                </div>
            </div>
            
            <!-- Issue: Color only to indicate required -->
            <div class="mb-3">
                <label>Terms and Conditions <span style="color: red;">*</span></label>
                <input type="checkbox" name="terms"> I agree
            </div>

            <button type="submit" class="btn btn-success">Complete Survey</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
