/**
 * 
 */
let quiz1 = [{
        "text": "ALU Rwanda is in Kigali. What is the truth value of the above statement?",
        "answers": [{
                "label": true,
                "value": true
            },
            {
                "label": false,
                "value": false
            },
            {
                "label": "Statement is not a proposition so it has no truth value",
                "value": "Not proposition"
            }
        ],
        "answer": "true"
    },
    {
        "text": "Can Mary come with you? Is this sentence a proposition?",
        "answers": [{
                "label": true,
                "value": true
            },
            {
                "label": false,
                "value": false
            },
        ],
        "answer": "false"
    },
    {
        "text": "8+1=4 or 3+2=5. Is this sentence a proposition?",
        "answers": [{
                "label": true,
                "value": true
            },
            {
                "label": false,
                "value": false
            },
        ],
        "answer": "true"
    },
    {
        "text": "What is the negation of the proposition: “8 is negative.”",
        "answers": [{
                "label": "8 is positive",
                "value": "8 is positive"
            },
            {
                "label": "8 is nonnegative",
                "value": "8 is nonnegative"
            },
            {
                "label": "8 is negative",
                "value": "8 is negative"
            }
        ],
        answer: "8 is nonnegative"
    },
    {
        "text": "The following compound proposition indicates which law of logic: p ∧ q ≡ q ∧ p",
        "answers": [{
                "label": "Associative laws",
                "value": "Associative laws"
            },
            {
                "label": "Distributive laws",
                "value": "Distributive laws"
            },
            {
                "label": "Commutative laws correct",
                "value": "Commutative laws correct"
            },
            {
                "label": "Idempotent laws",
                "value": "Idempotent laws"
            }
        ],
        answer: "Associative laws"
    }
]

let quiz2 = [{
        "text": "Determine whether this pair of sets are equal: {2,6,6,6,9,9,9,9,9} , {9,6,2}.",
        "answers": [{
                "label": "Yes, they are equal",
                "value": "Yes, they are equal"
            },
            {
                "label": "No, they are not",
                "value": "No, they are not"
            }
        ],
        "answer": "Yes, they are equal"
    },
    {
        "text": "Determine whether this pair of sets are equal: {{7}} , {7, {7}}.",
        "answers": [{
                "label": "Yes, they are equal",
                "value": "Yes, they are equal"
            },
            {
                "label": "No, they are not correct",
                "value": "No, they are not correct"
            },
        ],
        "answer": "Yes, they are equal"
    },
    {
        "text": "Determine whether this pair of sets are equal: ∅, {∅}",
        "answers": [{
                "label": "Yes, they are equal",
                "value": "Yes, they are equal"
            },
            {
                "label": "No, they are not",
                "value": "No, they are not"
            },
        ],
        "answer": "No, they are not"
    },
    {
        "text": "i) Z ii) W",
        "answers": [{
                "label": "the first is a subset of the second",
                "value": "the first is a subset of the second"
            },
            {
                "label": "the second is a subset of the first correct",
                "value": "the second is a subset of the first correct"
            },
            {
                "label": "neither is a subset of the other",
                "value": "neither is a subset of the other"
            }
        ],
        "answer": "the second is a subset of the first correct"
    },
    {
        "text": "The following compound proposition indicates which law of logic: p ∧ q ≡ q ∧ p",
        "answers": [{
                "label": "Associative laws",
                "value": "Associative laws"
            },
            {
                "label": "Distributive laws",
                "value": "Distributive laws"
            },
            {
                "label": "Commutative laws correct",
                "value": "Commutative laws correct"
            },
            {
                "label": "Idempotent laws",
                "value": "Idempotent laws"
            }
        ],
        "answer": "Associative laws"
    }
];

let quiz3 = [{
        "text": "What is the cardinality of this set below?  {v, v} Enter your numeric answer below:",
        "answer": "1"
    },
    {
        "text": "What is the cardinality of this set below? {b, {b}, {b, {b}}} Enter your numeric answer below:",
        "answer": "4"
    },
    {
        "text": "a. For all sets A, A ∪ ∅ = _________________________",
        "answer": "A"
    },
    {
        "text": "What is the name of you facilitator",
        "answer": "Obed Nsiah"
    }
]
/**
 * 
 * @param {*} question 
 */
function createChoiceQuestion(question, questionId) {
    let questionD = document.createElement('div');
    questionD.classList.add(["question", "question-m"]);
    // label
    let labelD = document.createElement("label");
    labelD.classList.add("question-text");
    labelD.innerHTML = question.text;
    questionD.appendChild(labelD);
    // answers
    let questionA = document.createElement('div');
    questionA.classList.add("question-answers");
    // 
    for (var i = 0; i < question.answers.length; i++) {
        let answer = question.answers[i];
        // label
        let labelV = document.createElement("label");
        labelV.classList.add("value-l");
        labelV.setAttribute("for", answer.label + " " + questionId);
        // input
        let input = document.createElement("input");
        input.type = "radio";
        input.id = answer.label + " " + questionId;
        input.name = "question" + questionId;
        input.value = answer.value;
        labelV.appendChild(input);
        // span for label
        let textSpan = document.createElement("span");
        textSpan.innerHTML = answer.label;
        labelV.appendChild(textSpan);
        //
        questionA.appendChild(labelV);
    }
    questionD.appendChild(questionA);
    return questionD;
}
/**
 * 
 * @param {*} question 
 */
function createInputQuestion(question, questionId) {
    let questionD = document.createElement('div');
    questionD.classList.add(["question", "question-m"]);
    // label
    let labelD = document.createElement("label");
    labelD.classList.add("question-text");
    labelD.innerHTML = question.text;
    questionD.appendChild(labelD);
    // question answers
    let questionA = document.createElement("div");
    questionA.classList.add('question-answers');
    //input 
    let input = document.createElement("input");
    input.type = "text";
    input.id = "question" + questionId;
    input.name = "question" + questionId;
    input.placeholder = "Answer";
    questionA.appendChild(input);
    questionD.appendChild(questionA);
    return questionD;
}

/**
 * for checking if questions are correct or wrong
 */
function checkQuestion(quizQuestions) {
    let count = 0;
    let quiz = document.quiz;
    for (let index = 0; index < quizQuestions.length; index++) {
        let question = eval(`quiz.question${index}`);
        let value = question.value;
        let expectedValue = quizQuestions[index].answer;
        if (value == expectedValue) {
            question[0].parentNode.parentNode.classList.add('success');
            count++;
        } else {
            question[0].parentNode.parentNode.classList.remove('success');
            question[0].parentNode.parentNode.classList.add('danger');
        }
    }
    return count;
}
/**
 * for checking if questions are correct or wrong
 */
function checkInputQuestion(quizQuestions) {
    let count = 0;
    let quiz = document.quiz;
    for (let index = 0; index < quizQuestions.length; index++) {
        let question = eval(`quiz.question${index}`);
        let value = question.value;
        let expectedValue = quizQuestions[index].answer;
        if (value == expectedValue) {
            question.classList.add('success');
            question.parentNode.parentNode.classList.add('success');
            count++;
        } else {
            question.parentNode.parentNode.classList.remove('success');
            question.parentNode.parentNode.classList.add('danger');
            question.classList.remove('success');
            question.classList.add('danger');
        }
    }
    return count;
}
/**
 * For quiz 2
 */
function createQuestions1() {
    let quiz = document.getElementById("quiz");
    for (var i = 0; i < quiz1.length; i++) {
        let question = createChoiceQuestion(quiz1[i], i);
        quiz.appendChild(
            question
        );
    }
}

function checkQuestions1() {
    document.getElementById("results").innerText = `${checkQuestion(quiz1)} out of ${quiz1.length}`;
}
/**
 * For quiz 2
 */
function createQuestions2() {
    let quiz = document.getElementById("quiz");
    for (var i = 0; i < quiz2.length; i++) {
        let question = createChoiceQuestion(quiz2[i], i);
        quiz.appendChild(
            question
        );
    }
}

function checkQuestions2() {
    document.getElementById("results").innerText = `${checkQuestion(quiz2)} out of ${quiz2.length}`;

}
/**
 * For quiz 3
 */
function createQuestions3() {
    let quiz = document.getElementById("quiz");
    for (var i = 0; i < quiz3.length; i++) {
        let question = createInputQuestion(quiz3[i], i);
        quiz.appendChild(
            question
        );
    }
}

function checkQuestions3() {
    document.getElementById("results").innerText = `${checkInputQuestion(quiz3)} out of ${quiz3.length}`;
}

/**
 * Submittion of the contact form
 */
function submitForm(){
    let contact = document.contact.names.value;
    let email = document.contact.names.email;
    if(!contact && !email){
        return;
    }
    document.getElementById("contact-message").innerText = contact + "\n Your Form is submitted. You will be contacted in 3 days.";
}