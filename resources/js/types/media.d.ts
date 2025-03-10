export interface PlaylistInterface {
  id: string;
  description: string;
  image: string;
  title: string;
  provider: 'media' | 'spotify';
}

export interface TrackInterface {
  title: string;
  author: string;
  album: string;
  playtime: string;
  path: string;
  id: string;
}
