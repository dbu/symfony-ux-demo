import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['messages'];
    static values = {
        url: String
    };

    connect() {
        this.eventSource = new EventSource(this.urlValue);
        this.eventSource.onmessage = (event) => this.appendMessage(event);
    }

    disconnect() {
        this.eventSource?.close();
    }

    appendMessage(event) {
        const payload = JSON.parse(event.data);
        const article = document.createElement('article');
        const label = document.createElement('span');

        label.className = 'label';
        label.textContent = payload.timestamp;
        article.append(label, ` ${payload.message}`);

        this.messagesTarget.append(article);
        this.messagesTarget.scrollTop = this.messagesTarget.scrollHeight;
    }
}
