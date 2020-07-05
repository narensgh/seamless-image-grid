import { Component, OnInit } from '@angular/core';

import { ContentService } from "../../services/content.service"

import { Post } from '../../interfaces/post'
@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {

  allPosts: Post[];
  heroes = ['Windstorm', 'Bombasto', 'Magneta', 'Tornado'];
  constructor(
    private contentService: ContentService
  ) { }

  ngOnInit(): void {
    this.getPosts();
  }

  getPosts(): void {
    this.contentService.getPosts()
      .subscribe((data: Post[]) => {
        this.allPosts = data.slice(0, 75);
      });
  }
}
