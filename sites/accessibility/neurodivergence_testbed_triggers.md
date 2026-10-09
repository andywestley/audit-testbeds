# Neurodivergent Accessibility Testbed Triggers

This document describes the exact HTML and CSS snippets you can add to your accessibility testbed to trigger each of the 8 checks performed by automated accessibility testing tools.

---

### 1. Viewport Zoom Restriction (`COG.NO_ZOOM`)
To trigger a failure for locking scaling:
```html
<!-- Inside the page <head> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
```
*or*
```html
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
```

---

### 2. Justified Text Alignment (`COG.JUSTIFIED_TEXT`)
Dyslexic readers find justified blocks hard to read due to uneven gaps between words ("rivers of white"). To trigger this, justify a text block containing **at least 50 characters**:
```html
<p style="text-align: justify;">
    This block of text has been aligned using the justify property, which will cause the scanner to flag a warning because the uneven spacing makes dyslexic reading significantly more difficult.
</p>
```

---

### 3. Absolute Font Size (`COG.ABS_FONT_SIZE`)
Hardcoding absolute units like `px` or `pt` prevents browsers from scaling text dynamically. To trigger this, define the font size inline on a block containing **at least 10 characters**:
```html
<span style="font-size: 14px;">This text uses a hardcoded pixel size inline.</span>
```

---

### 4. Small Click Targets (`COG.TARGET_SIZE`)
Click targets must be at least 24x24px. To trigger this, make an interactive target (such as a link, button, or input) smaller than 24px in height or width:
```html
<button style="width: 20px; height: 20px; padding: 0;">✖</button>
```

---

### 5. Wall of Text (`COG.WALL_OF_TEXT`)
Large blocks of text without visual breaks exhaust reading comprehension. To trigger this, create a `<p>` containing **more than 150 words**:
```html
<p>
    This is the start of a very long paragraph designed specifically to trigger the wall of text rule. In web accessibility, presenting too much text in a single block without paragraphs, lists, headers, or other breaks makes it extremely difficult for readers with ADHD, cognitive impairments, or learning disabilities to follow along. To successfully trigger this rule, we need to count up to more than one hundred and fifty words in total. So we will continue writing sentences, adding more content, detailing access standards, listing guidelines, describing components, explaining engines, discussing compliance scores, and detailing the 80/20 rule until we have passed the word limit threshold. It is crucial to have visual breaks because reading large amounts of text is mentally fatiguing. We are still writing more words here to ensure that we easily exceed the 150-word count required by the automated scanner. Almost there now!
</p>
```

---

### 6. Blocked Copy-Paste (`COG.BLOCKED_PASTE`)
Restricting paste operations forces manual transcription, increasing typing strain. To trigger this, use `preventDefault()` or return `false` on a text input's `onpaste` handler:
```html
<input type="text" placeholder="Confirm Email" onpaste="event.preventDefault(); return false;">
```

---

### 7. Complex Wording (`COG.COMPLEX_WORDING`)
Paragraphs with sentences averaging more than 30 words are flagged. To trigger this, write a paragraph of **at least 100 characters** where sentences are very long:
```html
<p>
    Although modern web design tends to favor short and simple sentences that are easy to digest, this particular paragraph uses excessively long sentences that run on for a very long time without any periods to break them up, thereby increasing cognitive comprehension load. Consider simplifying the vocabulary and structure of these sentences to ensure that all users can read the text without experiencing mental fatigue or needing to re-read it.
</p>
```

---

### 8. Rapid Flashing Content (`COG.RAPID_FLASHING`)
Flashing animations faster than 3Hz (less than or equal to 0.33 seconds duration) can trigger sensory distress or seizures. To trigger this, define a fast, infinite animation in CSS:
```html
<!-- HTML -->
<div class="danger-flash">Warning!</div>

<!-- CSS -->
<style>
@keyframes flash-effect {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}
.danger-flash {
    animation: flash-effect 0.2s infinite;
}
</style>
```
