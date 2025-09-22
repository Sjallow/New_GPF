# Rwanda National Police Website Setup Guide

## Overview
This WordPress theme replicates the design of the Rwanda National Police website with full Elementor integration for easy customization.

## Installed Plugins

### 1. Ditty News Ticker
- **Purpose**: Displays scrolling news ticker in the header
- **Usage**: Go to WordPress Admin > News Ticker to add ticker items
- **Shortcode**: `[ditty_ticker]` (already integrated in header)

### 2. Smart Slider 3
- **Purpose**: Creates hero section sliders
- **Usage**: Go to WordPress Admin > Smart Slider to create sliders
- **Shortcode**: `[smart_slider id="1"]` (already integrated in homepage)

### 3. Elementor
- **Purpose**: Visual page builder for easy customization
- **Usage**: Edit any page with Elementor to customize content

## Theme Features

### Header
- Trending news ticker (using Ditty plugin)
- Social media icons (Font Awesome)
- Language selector (English/Kinyarwanda)
- Contact information
- Main logo and title
- Navigation menu

### Homepage Sections
1. **Hero Section**: Smart Slider 3 integration
2. **Emergency Numbers**: 7 emergency contact cards
3. **Services**: 3 service cards with images
4. **Interactive Buttons**: Report Crime, Feedback, Request, FAQs
5. **News & Media**: News, Videos, Photos, Twitter feed
6. **Newsletter Signup**: Email subscription form
7. **Police Schools**: 3 training institution cards
8. **Footer**: Contact info and recommended pages

### Custom Post Types
- News
- Videos
- Photos
- Services

## Customization

### Using WordPress Customizer
1. Go to Appearance > Customize
2. **Header Settings**: Change main title and slogan
3. **Contact Information**: Update email, phone numbers

### Using Elementor
1. Edit any page with Elementor
2. Drag and drop widgets
3. Customize colors, fonts, spacing
4. Add your own content and images

### Adding Content

#### News Ticker Items
1. Go to WordPress Admin > News Ticker
2. Click "Add Ticker Item"
3. Enter title, content, and optional link
4. Items will appear in the header ticker

#### Hero Slider
1. Go to WordPress Admin > Smart Slider
2. Create a new slider
3. Add slides with images, titles, and content
4. Use shortcode `[smart_slider id="X"]` where X is the slider ID

#### News Articles
1. Go to Posts > Add New (or News > Add New)
2. Add title, content, and featured image
3. Publish to appear on homepage

#### Services
1. Go to Services > Add New
2. Add title, description, and featured image
3. Services will appear in the services section

## Required Images

Place these images in `/wp-content/themes/gambia-police-force/images/`:

### Logos
- `rwanda-police-logo.png` - Main RNP logo
- `dove-logo.png` - Dove with olive branch logo

### Content Images
- `news-main.jpg` - Main news article image
- `video-thumbnail.jpg` - Video thumbnail
- `photo-gallery.jpg` - Photo gallery image
- `twitter-feed.jpg` - Twitter feed image
- `national-police-college.jpg` - National Police College
- `police-training-school-gishari.jpg` - Training School Gishari
- `counter-terrorism-training-center.jpg` - Counter Terrorism Center
- `traffic-safety.jpg` - Traffic and Road Safety service
- `testing-licensing.jpg` - Testing and Licensing service
- `vehicle-inspection.jpg` - Vehicle Inspection service

## Color Scheme
- Primary Blue: #1e3a8a
- Dark Blue: #1e40af
- Accent Yellow: #fbbf24
- White: #ffffff
- Gray: #f3f4f6

## Fonts
- Primary: Arial, sans-serif
- Font Awesome icons for social media and UI elements

## Responsive Design
- Mobile-first approach
- Responsive grid layouts
- Mobile-optimized navigation
- Touch-friendly buttons and forms

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Support
For technical support or customization requests, contact your web developer.

## Updates
- Keep WordPress, theme, and plugins updated
- Backup before making major changes
- Test changes on staging site first
