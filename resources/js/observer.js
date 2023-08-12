/**
 *
 * @param selector
 * @param option
 */
export default function scrollObserver(selector, option) {
    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            setTimeout(() => {
                console.log(entry)
                let showCount = 0
                if (option?.once) {
                    if (showCount === 0 && entry.isIntersecting) {
                        entry.target.classList.add('shown')
                        option.onshow ? option.onshow(entry) : false
                        showCount++
                    }
                } else {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('shown')
                        if (option && option.onshow) option.onshow(entry)
                    } else {
                        entry.target.classList.remove('shown')
                        if (option && option.onhide) option.onhide(entry)
                    }
                }
            }, 0);
        })
    }, option)

    if (Array.isArray(selector)) {
        selector.forEach(qAll)
    } else {
        qAll(selector)
    }

    function qAll(selector) {
        const item = document.querySelectorAll(selector)
        item.forEach(i => observer.observe(i))
    }
}