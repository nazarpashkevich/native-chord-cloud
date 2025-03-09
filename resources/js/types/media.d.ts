export interface PlaylistInterface {
  id: string;
  description: string;
  image: string;
  title: string;
  provider: 'internal' | 'spotify';
}

export interface TrackInterface {
  title: string;
  author: string;
  album: string;
  playtime: string;
  path: string;
  id: string;
}
