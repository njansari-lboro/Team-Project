$(() => {
    hideComments();
    clearList();
    datePicker();
    setPriorityBackgroundColours();
    toggleComplete();
    addButton();
    hideSmallScreenInputs();
    checkMediaQuery();
    minusButton();

    $(".items-container").on("click", ".ellipsis", addToggles);
});

function hideComments() {
    $(".comments").hide();
}

function hideSmallScreenInputs() {
    $(".small-screen-date").hide();
}

function addToggles() {
    const comments = $(this).closest(".item").find(".comments");
    comments.slideToggle();
}

function addButton() {
    $(".add").click(() => {
        const newItemHtml = `
        <form class="item">
            <div class="inputs">
                <div class="task-name">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon tick" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M352 176L217.6 336 160 272"/></svg>
                    
                    <input type="text" placeholder="Task name" class="task-input input">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon ellipsis" viewBox="0 0 512 512"><circle cx="256" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><circle cx="416" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><circle cx="96" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                </div>

                <div class="due-date">
                    <input type="text" placeholder="Due date" class="due-date-input input datepicker">
                </div>
                
                <div class="priority">
                    <select name="priority" class="priority-select priority-input input select-input">
                        <option value="none">None</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
            </div>

            <div class="comments hidden">
                <textarea name="comments-input" class="comments-input"></textarea>
            </div>
        </form>
        `;

        const btnAddItemHtml = `
        <div class="new-item">
            <div class="add-div-container">
                <div class="add-div">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon add" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176"/></svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon minus" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M336 256H176"/></svg>
                </div>
            </div>
        </div>
        `;

        const container = $(".items-container");

        container.children().last().remove();

        container.append(newItemHtml);
        container.append(btnAddItemHtml);

        addButton();
        minusButton();
        hideComments();
        datePicker();
        addToggles();
    });
}

function minusButton() {
    $(".minus").click(() => {
        const container = $(".items-container");

        const element = container.children().eq(-2);

        if (element.hasClass("item")) {
            container.children().eq(-2).remove();
        }
    });
}

function clearList() {
    $(".clear-list").click(() => {
        const btnAddItemHtml = `
        <div class="new-item">
            <div class="add-div-container">
                <div class="add-div">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon add" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176"/></svg>
                </div>
            </div>
        </div>
        `;

        const container = $(".items-container");

        container.children().slice(1).remove();
        container.append(btnAddItemHtml);
        addButton();
    });
}

function datePicker() {
    $(".items-container").on("focus", ".datepicker", function () {
        // Initialize datepicker for dynamically added elements
        $(this).datepicker({ dateFormat: "dd/mm/yy" });
    });
}

function setPriorityBackgroundColours() {
    $(".items-container").on("change", ".priority-select", function () {
        let selectedPriority = $(this).val().toLowerCase();
        let selectedElement = $(this);

        selectedElement.removeClass("high low medium");

        if (selectedPriority !== "none") {
            selectedElement.addClass(selectedPriority);
        }
    });
}

function toggleComplete() {
    $(".items-container").on("click", ".tick", function () {
        let parentDiv = $(this).closest(".item");
        parentDiv.toggleClass("complete");

        if (parentDiv.hasClass("complete")) {
            let inputs = parentDiv.find("input, select, textarea");
            inputs.prop("readonly", true).prop("disabled", true);
        } else {
            let inputs = parentDiv.find("input, select, textarea");
            inputs.prop("readonly", false).prop("disabled", false);
        }
    });
}

function checkMediaQuery() {
    $(window).on("resize"), function () {
        let windowWidth = $(window).width();

        if (windowWidth <= 600) {
            $(".header-due-date").hide();

            $(".header-task-name").css("width", "75%");
            $(".header-priority").css("width", "25%");

            $(".task-name").css("width", "75%");
            $(".priority").css("width", "25%");

            $(".due-date").each(function () {
                parentDiv = $(this).parent().parent();
                $(this).hide();

                let dueDate = $(this).find("input").val();
                let smallScreenDateInput = $(this).parent().siblings(".comments").find(".small-screen-date");

                smallScreenDateInput.show();
                smallScreenDateInput.val(dueDate);
            });
        }
    };
}
