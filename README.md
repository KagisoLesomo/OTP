# 🏆 ArenaX – Online Tournament Platform

ArenaX is a web-based competitive gaming platform where users can join online tournaments and play classic games like **Checkers**, **Tic-Tac-Toe**, and **Rock–Paper–Scissors** against random opponents. The platform runs on a **LAMP stack** (Linux, Apache, MySQL, PHP) and tracks player performance to build a global competitive ranking system.

---

## 🎮 Features

### Online Matchmaking
- Queue up and get paired with a random opponent in real time for any supported game
- Automatic opponent matching based on availability and optional skill-based pairing
- Live game sessions with real-time move validation

### Multiple Competitive Games

**Checkers**
- Turn-based board game with full rule enforcement
- Win/loss/draw tracking
- Longer match duration, strategic gameplay

**Tic-Tac-Toe**
- Quick, accessible matches ideal for rapid ranking changes
- Perfect for new players and fast-paced tournaments

**Rock–Paper–Scissors**
- Fast, simple game for quick-fire tournaments
- Ideal for rapid skill assessment

### Ranked Ladder System
- **PHP backend** records match results in MySQL and updates player scores and ranks
- Player performance is tracked over time to reflect real skill progression
- Inspired by Elo-style rating systems for competitive balance
- Dynamic rank adjustments based on opponent strength
- Win streaks and performance bonuses

### Player Profiles & Statistics
- **Total wins, losses, and draws** across all games
- **Recent match history** with opponent names and results
- **Current rank and rating** with visual progression
- **Per-game statistics** showing performance in each game type
- **Achievement badges** for milestones and accomplishments

### Leaderboards
- **Global rankings** across all players
- **Per-game leaderboards** for each competitive game
- **Weekly and monthly rankings** for seasonal competition
- Real-time rank updates

---

## 🏗️ Architecture & Tech Stack

### Frontend
- **HTML5** – Semantic structure for game boards and UI
- **CSS3** – Responsive design for desktop and tablet gameplay
- **JavaScript** – Game logic validation, move submission, real-time UI updates

### Backend
- **PHP** for:
  - User authentication and session management
  - Matchmaking algorithm to pair random opponents
  - Move validation for each game type (Checkers, Tic-Tac-Toe, Rock–Paper–Scissors)
  - Game state management and turn tracking
  - Score calculation and ranking updates after each match
  - API endpoints for game actions and profile data

### Database
- **MySQL** for:
  - User accounts, authentication credentials, and profiles
  - Game sessions and active match states
  - Complete match history with results and timestamps
  - Player ratings, rankings, and leaderboard positions
  - Game-specific statistics and performance metrics
  - Achievement tracking and milestone logs

### Infrastructure
- **LAMP Stack**:
  - **Linux** – Operating system for the server
  - **Apache** – Web server with mod_php enabled
  - **MySQL** – Relational database management system
  - **PHP** – Server-side scripting language for business logic

---

## 📊 Ranking & Scoring System

### How Rankings Work
- Each completed match updates both players' records and rating
- Wins, losses, and draws have different score impacts
- Larger rating gains for winning against higher-ranked opponents (Elo-style adjustment)
- Larger rating losses for losing to lower-ranked opponents
- Draw outcomes provide minimal rating changes

### Rating Calculation
- Base rating change per match: typically 10–50 points
- Multiplier based on opponent's rank difference
- Win bonus for defeating significantly higher-ranked players
- Loss penalty scaled to opponent strength
- Global and per-game leaderboards reflect current rankings

### Progression
- New players start at a baseline rating (e.g., 1000 Elo)
- Ranks update in real time after match completion
- Players can track their rating history and progression over time

---

## 🚀 Getting Started

### Prerequisites
- A **LAMP server** (Linux/Apache/MySQL/PHP) or local development environment
- **PHP 7.4+** with MySQLi extension enabled
- **MySQL 5.7+** for database
- A modern web browser (Chrome, Firefox, Edge, Safari)

---

## 🎮 Game Rules

### Checkers
- Standard 8x8 board with 12 pieces per player
- Pieces move diagonally one square forward
- Capturing opponent pieces by jumping
- Reaching the opposite end promotes to a "king"
- Kings can move and capture diagonally backward
- Match ends when one player has no legal moves

### Tic-Tac-Toe
- 3x3 grid with alternating X and O moves
- First player to get three in a row (horizontal, vertical, or diagonal) wins
- Draw if the board fills with no winner
- Quick matches, typically under 2 minutes

### Rock–Paper–Scissors
- Best-of-three format per match
- Rock beats Scissors, Scissors beats Paper, Paper beats Rock
- Simultaneous move submission to prevent cheating
- First to win 2 out of 3 rounds wins the match
- Results determine rating changes


---

## 🌐 Browser & Server Compatibility

### Tested Browsers
- ✅ Google Chrome (latest version)
- ✅ Mozilla Firefox (latest version)
- ✅ Microsoft Edge (latest version)
- ✅ Safari (latest version)

### Server Requirements
- Apache 2.4+ with mod_php or PHP-FPM
- MySQL 5.7+ or MariaDB 10.2+
- PHP 7.4+ with mysqli extension
- Recommended: 2GB RAM, 10GB disk space for database

---

## ⚠️ Known Issues & Limitations

### Current Limitations
- Checkers AI opponent not yet implemented (human-vs-human only)
- Mobile app not yet available (web-only)
- Maximum concurrent players limited by server resources

### In Progress
- Performance optimization for high-traffic periods
- Enhanced anti-cheat detection
- Mobile-responsive interface improvements

---

## 🔒 Security Features

- **Password Hashing** – bcrypt for secure credential storage
- **Session Management** – Secure PHP sessions with timeout
- **CSRF Protection** – Token validation on form submissions
- **Input Validation** – Strict validation of all game moves and user input
- **HTTPS Ready** – Deployable with SSL/TLS certificates

---

## 💡 Gameplay Features

### Match Types
- **Ranked Matches** – Official games that affect rating and ranking
- **Quick Play** – Casual matches without ranking impact (future)
- **Tournaments** – Bracket-based elimination events (future)

### Player Progression
- New accounts start at 1000 Elo rating
- Rating adjustments after every ranked match
- Rank tiers (Beginner, Intermediate, Advanced, Master)
- Season resets and placement matches

### Rewards System
- XP gains for wins and streaks
- Achievement badges for milestones
- Cosmetic rewards and profile customization (future)

---

## 🤝 Contributing

We welcome feedback and contributions! If you'd like to:
- Report bugs or technical issues
- Suggest new game types or features
- Share gameplay feedback
- Contribute code improvements

Please feel free to:
- [Open an issue](https://github.com/KagisoLesomo/OTP/issues) on GitHub
- [Submit a pull request](https://github.com/KagisoLesomo/OTP/pulls)
- Contact us directly (see below)

---

## 📝 License

[Add your license here - e.g., MIT, Apache 2.0, etc.]

---

## 📧 Support & Feedback

Your feedback helps us improve ArenaX! If you encounter any issues, have suggestions, or want to share your experience:

- **[Report a Bug](https://github.com/KagisoLesomo/OTP/issues)**: Create a GitHub issue with details
- **[Feature Request](https://github.com/KagisoLesomo/OTP/issues)**: Suggest new games or features
- **[Discussions](https://github.com/KagisoLesomo/OTP/discussions)**: Join community discussions
- **Direct Contact**: Reach out to the authors

---

## 🎯 Future Roadmap

- **Game Expansions**
  - Connect Four, Reversi, and Chess
  - AI opponents for single-player practice
  - Tournament mode with brackets and prizes

- **Social Features**
  - Friend lists and direct challenges
  - Chat and in-game communication
  - Spectator mode for live matches
  - Clan/team system

- **Technical Improvements**
  - WebSocket integration for real-time updates
  - Mobile app (React Native)
  - Performance optimization and caching
  - Advanced anti-cheat detection
---


## 🙏 Thank You

Thank you for choosing ArenaX! We're excited to have you compete, climb the ranks, and enjoy strategic gameplay. Whether you're a casual player or a competitive enthusiast, ArenaX brings the thrill of online competition to classic games.

**May the best player win! 🏆**
