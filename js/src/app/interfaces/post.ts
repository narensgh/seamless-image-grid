export interface Post {
    image: Image,
    path: string,
    type: string,
    title: string,
    viewCount: number
}

export interface Image {
    url: string,
    width: number,
    height: number,
}