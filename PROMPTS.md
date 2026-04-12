AI Use Declaration
AI Tool(s) Used: Gemini 3 Flash / ChatGPT

Purpose of AI Use: * [x] brainstorming

[x] layout/UI ideas

[x] debugging

[x] code generation

[x] refactoring

[x] styling suggestions

Where AI was used:
AI was primarily used to generate the CSS Grid and Flexbox layouts for the "About Me" cards and the glassmorphism effect in the Education section. It also helped structure the JavaScript logic for the smooth scrolling and the personalized greeting prompt that displays the visitor's name with a specific CSS class.

I confirm that I reviewed, tested, and understood the final code I submitted.

AI Prompt Log (PROMPTS.md)
Entry #1
Tool Used: Gemini 3 Flash

Prompt: "I am building a personal portfolio in HTML/CSS. Can you give me a modern, professional CSS design for an 'Education' section? I want it to look like glass cards with a colored indicator on the left side."

AI Output: The AI provided a CSS structure using rgba(255, 255, 255, 0.8) for a glass effect and a linear-gradient for a .edu-indicator class.

How I used/modified it: I integrated the .edu-glass-card and .edu-indicator classes into my james.css file. I modified the colors to match my theme's purple and maroon gradient (#5151be to #864752).

Entry #2
Tool Used: Gemini 3 Flash

Prompt: "Write a JavaScript snippet that asks a user for their name when the page loads, then displays a greeting like 'Good Morning, [Name]' inside an H1 tag with the ID 'display-name'. Also, make the name look different using a CSS class."

AI Output: The AI suggested using window.addEventListener('DOMContentLoaded', ...) and a prompt() function, followed by updating the innerHTML of the target ID.

How I used/modified it: I added this to script.js. I included a setTimeout of 500ms so the prompt doesn't appear until the website starts rendering in the background. I also ensured the visitor's name is wrapped in a <span class='name-style'> for custom styling.

Entry #3
Tool Used: Gemini 3 Flash

Prompt: "How do I fix a fixed header that is covering the top of my sections when I click a navigation link?"

AI Output: The AI recommended two solutions: adding scroll-behavior: smooth to the HTML and using a JavaScript offset in the click event listener.

How I used/modified it: I applied the scroll-behavior: smooth in my CSS reset. In script.js, I implemented the offset logic: window.scrollTo({ top: targetElement.offsetTop - 70, behavior: 'smooth' }); to ensure the header doesn't block the section title.
