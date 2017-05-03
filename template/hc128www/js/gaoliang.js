        function MarkHighLight(obj, hlWords, bgColor) {
            hlWords = AnalyzeHighLightWords(hlWords);
            if (obj == null || hlWords.length == 0)
                return;
            if (bgColor == null || bgColor == "") {
                bgColor = "red";
            }
            MarkHighLightCore(obj, hlWords);
            function MarkHighLightCore(obj, keyWords) {
                var re = new RegExp(keyWords, "i");
                var style = ' style="color:' + bgColor + ';" '
                for (var i = 0; i < obj.childNodes.length; i++) {
                    var childObj = obj.childNodes[i];
                    if (childObj.nodeType == 3) {
                        if (childObj.data.search(re) == -1) continue;
                        var reResult = new RegExp("(" + keyWords + ")", "gi");
                        var objResult = document.createElement("span");
                        objResult.innerHTML = childObj.data.replace(reResult, "<span" + style + ">$1</span>");
                        if (childObj.data == objResult.childNodes[0].innerHTML) continue;
                        obj.replaceChild(objResult, childObj);
                    } else if (childObj.nodeType == 1) {
                        MarkHighLightCore(childObj, keyWords);
                    }
                }
            }
            function AnalyzeHighLightWords(hlWords) {
                if (hlWords == null) return "";
                hlWords = hlWords.replace(/\s+/g, "|").replace(/\|+/g, "|");
                hlWords = hlWords.replace(/(^\|*)|(\|*$)/g, "");
                if (hlWords.length == 0) return "";
                var wordsArr = hlWords.split("|");
                if (wordsArr.length > 1) {
                    var resultArr = BubbleSort(wordsArr);
                    var result = "";
                    for (var i = 0; i < resultArr.length; i++) {
                        result = result + "|" + resultArr[i];
                    }
                    return result.replace(/(^\|*)|(\|*$)/g, "");
                } else {
                    return hlWords;
                }
            }
            function BubbleSort(arr) {
                var temp, exchange;
                for (var i = 0; i < arr.length; i++) {
                    exchange = false;
                    for (var j = arr.length - 2; j >= i; j--) {
                        if ((arr[j + 1].length) > (arr[j]).length) {
                            temp = arr[j + 1]; arr[j + 1] = arr[j]; arr[j] = temp;
                            exchange = true;
                        }
                    }
                    if (!exchange) break;
                }
                return arr;
            }
        }
        function search() {
            var obj = document.getElementById("waiDiv");
            var keyWord = document.getElementById("keyWord");
            MarkHighLight(obj, keyWord.value, "Orange");
        }