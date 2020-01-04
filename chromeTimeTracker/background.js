let taskValues;
let name = "...";
initValues();
console.log("background running");




chrome.browserAction.onClicked.addListener(buttonClicked);

function buttonClicked(tab) {
    let msg = {
        txt: "hello"
    }
    chrome.tabs.sendMessage(tab.id, msg);
}


function initValues() {
    taskValues = ["-"];
    for (i=0; i < 95; i++) {
        taskValues.push("-");
    }
}

chrome.runtime.onMessage.addListener(newTaskSubmited);
function newTaskSubmited(request, sender, sendResponse) {
    if (request.purpose == "storeNewTask") {
        console.log("task is stored in index " + request.index);
        taskValues[request.index] = request.task;
        console.log("New task revcieved: " + taskValues[request.index]);
        sendResponse({notUsed:"notUsed"});
    } else if (request.purpose == "getHistory") {
        console.log("History sended");
        console.log(taskValues);
        sendResponse({history:taskValues});
    } else if (request.purpose == "newName") {
        console.log("new name recieved is "+ request.name);
        name = request.name;
        sendResponse({notUsed:"notUsed"});
    } else if (request.purpose == "getName") {
        sendResponse({name:name});
    }
}
