import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ContentService {

  apiPath = './assets/fashion-section.json';
  constructor(private http: HttpClient) {
  }

  getPosts() {
    return this.http.get(this.apiPath);
  }
}
